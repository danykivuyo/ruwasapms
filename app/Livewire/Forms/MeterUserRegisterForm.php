<?php

namespace App\Livewire\Forms;

use App\Http\Controllers\SMSController;
use App\Models\Cbwso;
use App\Models\Customer;
use App\Models\District;
use App\Models\Meter;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MeterUserRegisterForm extends Component
{
    public $client_name;
    public $client_number;
    public $client_house_number;
    public $client_meter_id;
    public $client_card_id = "";
    public $client_initial_amount = 0;
    public $meter_id;
    public $regions;
    public $region;
    public $districts = [];
    public $district;
    public $user;
    public $meter_ids = [];
    protected $control_number;
    protected $rules = [
        'client_name' => 'required|string|max:255',
        'client_number' => 'required',
        'meter_id' => 'required|max:4'
    ];

    protected function rules()
    {
        $rules = [
            'client_name' => 'required|string|max:255',
            'client_number' => 'required',
            'meter_id' => 'required|max:4'
        ];

        if ($this->starts_with($this->meter_id, 'H')) {
            $rules['meter_id'] .= '|unique:customers';
        }

        return $rules;
    }

    protected function starts_with($string, $startString)
    {
        return strncmp($string, $startString, strlen($startString)) === 0;
    }

    public function update_region($value)
    {
        $this->update_districts($value);
    }

    public function update_district($value)
    {
        $this->update_meter_ids();
        $this->district = $value;

    }

    public function update_meter_ids()
    {
        if ($this->user->role == "cbwso") {
            $this->meter_ids = Meter::query()
                ->where('cbwso', $this->user->cbwso)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "district") {
            $this->meter_ids = Meter::query()
                ->where('district', $this->user->district)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "region") {
            $this->meter_ids = Meter::query()
                ->where('region', $this->user->region)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "admin") {
            $this->meter_ids = Meter::query()
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "country") {
            $this->meter_ids = Meter::query()
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
            $this->meter_ids = [];
        }
    }

    public function updated($name, $value)
    {
        // $this->update_districts($value);
    }

    public function updatedRegion($value)
    {
        // $this->emit('updatedRegion');
        $this->update_districts($value);
        $this->region = $value;

    }

    public function update_districts($region)
    {

        $region = Region::with([
            'districts' => function ($query) {
                $query->select('id', 'region_id', 'name');
            }
        ])
            ->where('name', $region)
            ->select('id', 'name')
            ->get()
            ->toArray();

        if (isset($region[0])) {
            $this->districts = $region[0]['districts'];
        } else {
            $this->districts = [];
        }
    }


    public function mount()
    {
        $this->regions = Region::with([
            'districts' => function ($query) {
                $query->select('id', 'region_id', 'name');
            }
        ])
            ->select('id', 'name')
            ->get()
            ->toArray();

        $this->user = User::find(Auth::user()->id);
        if ($this->user->role == "cbwso") {
            $this->meter_ids = Meter::query()
                ->where('cbwso', $this->user->cbwso)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "district") {
            $this->meter_ids = Meter::query()
                ->where('district', $this->user->district)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "region") {
            $this->meter_ids = Meter::query()
                ->where('region', $this->user->region)
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "admin") {
            $this->meter_ids = Meter::query()
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else if ($this->user->role == "country") {
            $this->meter_ids = Meter::query()
                ->when($this->district != "", function ($query) {
                    return $query->where('district', $this->district);
                })
                ->whereIn('type', ['PD', 'HHC'])
                ->get();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
            $this->meter_ids = [];
        }
    }

    public function generate_control_number($prefix = '91', $length = 10)
    {
        $randomNumber = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        $controlNumber = $prefix . $randomNumber;
        return $controlNumber;
    }

    public function register()
    {
        $this->validate();
        $meter = Meter::find($this->meter_id);

        $this->control_number = $this->generate_control_number("91", 13);

        if (strlen($this->client_card_id) < 3)
            $this->client_card_id = "HHC#USR@DEF";

        Customer::create([
            'meter_id' => $this->meter_id,
            'name' => $this->client_name,
            'phone' => $this->client_number,
            'house_number' => $this->client_house_number,
            'tag_id' => $this->client_card_id,
            'control_number' => $this->control_number,
            'balance' => $this->client_initial_amount
        ]);

        $meter = Meter::where('meter_id', $this->meter_id)->first();
        $cbwso = Cbwso::where('name', $meter->cbwso);
        if (isset($cbwso->tarrif)) {
            $meter->balance = $this->client_initial_amount / $cbwso->tarrif;
        } else {
            $meter->balance = $this->client_initial_amount / 1000;
        }



        $sms = new SMSController();

        if ($this->starts_with($this->meter_id, 'P')) {
            $sms->meter_register_sms($this->client_card_id, $meter->meter_number, $this->client_initial_amount);
        }

        if ($this->starts_with($this->meter_id, 'H')) {
            $sms->hhc_recharge_sms($meter->meter_number, $meter->balance);
        }

        $meter->save();

        $sms->send_control_number($this->client_number, $this->meter_id, $this->control_number, $this->client_initial_amount);
        session()->flash('success', 'Client Registered Successfully!');

        $this->reset([
            'meter_id',
            'client_name',
            'client_number',
            'client_house_number',
            'client_card_id',
            'client_initial_amount'
        ]);

    }


    public function render()
    {
        return view('livewire.forms.meter-user-register-form');
    }
}
