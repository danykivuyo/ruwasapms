<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomersTable extends Component
{
    public $customers = [];
    public $user;
    public $meter_ids;
    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
        if ($this->user->role == "cbwso") {
            $this->meter_ids = Meter::query()
                ->where('cbwso', $this->user->cbwso)
                ->pluck('meter_id')
                ->toArray();
        } else if ($this->user->role == "district") {
            $this->meter_ids = Meter::query()
                ->where('district', $this->user->district)
                ->pluck('meter_id')
                ->toArray();
        } else if ($this->user->role == "region") {
            $this->meter_ids = Meter::query()
                ->where('region', $this->user->region)
                ->pluck('meter_id')
                ->toArray();
        } else if ($this->user->role == "admin") {
            $this->meter_ids = Meter::query()
                ->pluck('meter_id')
                ->toArray();
        } else if ($this->user->role == "country") {
            $this->meter_ids = Meter::query()
                ->pluck('meter_id')
                ->toArray();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
            $this->meter_ids = [];
        }
        $this->customers = Customer::whereIn('meter_id', $this->meter_ids)->get();
    }
    public function render()
    {
        return view('livewire.customers-table');
    }
}
