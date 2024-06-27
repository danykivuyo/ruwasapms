<?php

namespace App\Livewire\Forms;

use App\Http\Controllers\SMSController;
use App\Models\Cbwso;
use App\Models\Customer;
use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class PurchaseForm extends Component
{
    public $meter_id = "";
    public $user_id = "";
    public $meter_number = "";
    public $balance = "";
    public $user_name = "";
    public $cbwso = "";
    public $user;
    public $meter;
    public $amount;

    public $tag_id_active = false;

    protected $rules = [
        'meter_id' => 'required|string|max:255',
        'user_id' => 'required|string|max:255',
        'amount' => 'required|string'
    ];

    public function update_id($meter_id)
    {
        $this->meter_id = $meter_id;
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $meter = Meter::where('meter_id', $this->meter_id)
                ->where('cbwso', $user->cbwso)
                ->first();
        }
        if ($user->role == "district") {
            $meter = Meter::where('meter_id', $this->meter_id)
                ->where('district', $user->district)
                ->first();
        }
        if ($user->role == "region") {
            $meter = Meter::where('meter_id', $this->meter_id)
                ->where('region', $user->region)
                ->first();
        }
        if ($user->role == "admin") {
            $meter = Meter::where('meter_id', $this->meter_id)
                ->first();
        }

        if ($meter) {
            //execute
            $this->meter = $meter;
            if (str_starts_with($meter->meter_id, "H")) {
                $this->tag_id_active = false;
                $user = Customer::where('meter_id', $this->meter->meter_id)->first();
                $this->meter_number = $this->meter->meter_number;
                $this->cbwso = $this->meter->cbwso;
                if ($user) {
                    $this->user = $user;
                    $this->user_id = $this->user->tag_id;
                    $this->user_name = $this->user->name;
                    $this->balance = number_format(floatval($this->user->balance), 2) . " TZS";

                }
            } else if (str_starts_with($meter->meter_id, "P")) {
                $this->tag_id_active = true;
                $this->meter_number = $this->meter->meter_number;
                $this->cbwso = $this->meter->cbwso;
            }
        } else {
            $this->tag_id_active = false;
            $this->meter_number = "";
            $this->cbwso = "";
            $this->user_id = "";
            $this->user_name = "";
            $this->balance = "";
        }
    }

    public function update_tag_id($tag_id)
    {
        $user = Customer::where('tag_id', $tag_id)->first();
        if ($user) {
            $this->user = $user;
            if (str_starts_with($this->meter->meter_id, "P")) {
                $this->balance = $this->user->balance;
                $this->user_name = $this->user->name;
            }
        } else {
            $this->balance = "";
            $this->user_name = "";
        }
    }

    public function register()
    {
        $this->validate();
        $meter = Meter::where('id', $this->meter->id)->first();
        $sms = new SMSController();
        $this->meter_id = strtoupper($this->meter_id);
        // dd($this->amount);
        if (str_starts_with($this->meter_id, 'H')) {
            $cbwso = Cbwso::where('name', $meter->cbwso)->first();
            if ($cbwso) {
                $meter->balance = number_format(floatval($this->amount) / floatval($cbwso->tarrif), 2) + (floatval($this->user->balance) / floatval($cbwso->tarrif));
            } else {
                session()->flash('error', 'Register This CBWSO first!');
                return;
                // $meter->balance = ($this->amount / 1000) + $meter->balance;
            }
            if ($cbwso->updated_at->isToday()) {
                $cbwso->daily_income = floatval($cbwso->daily_income) + floatval($this->amount);
            } else {
                $cbwso->daily_income = $this->amount;
            }
            if ($cbwso->updated_at->isSameMonth(Carbon::now())) {
                $cbwso->monthly_income = $cbwso->monthly_income + $this->amount;
            } else {
                $cbwso->monthly_income = $this->amount;
            }
            if ($cbwso->updated_at->isSameYear(Carbon::now())) {
                $cbwso->yearly_income = floatval($cbwso->yearly_income) + floatval($this->amount);
            } else {
                $cbwso->yearly_income = $this->amount;
            }
            $cbwso->save();
            $meter->save();
            $this->meter = $meter;
            $user = Customer::where('id', $this->user->id)->first();
            $user->balance = number_format((floatval($user->balance) + floatval($this->amount)), 2);
            $user->save();
            $sms->hhc_recharge_sms($this->meter->meter_number, number_format($this->amount / $cbwso->tarrif, 2));
            $sms->hhc_recharge_customer_sms($this->user->phone, $this->meter->meter_id, $this->amount, number_format($this->amount / $cbwso->tarrif, 2));

            $this->reset([
                'meter_id',
                'user_id',
                'meter_number',
                'balance',
                'user_name',
                'cbwso',
                'amount'
            ]);

            session()->flash('message', "Successfully Recharged");
        } else {
            dd('pulblic');
        }

    }

    public function render()
    {
        return view('livewire.forms.purchase-form');
    }
}
