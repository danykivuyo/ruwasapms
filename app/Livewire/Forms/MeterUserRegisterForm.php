<?php

namespace App\Livewire\Forms;

use App\Models\Meter;
use Livewire\Component;

class MeterUserRegisterForm extends Component
{
    public $client_name;
    public $client_number;
    public $client_house_number;
    public $client_meter_id;
    public $cliet_card_id;
    public $client_initial_amount;

    protected $rules = [
        'client_name' => 'required|string|max:255',
        'client_number' => 'required',
        'client_meter_id' => 'required|max:4'
    ];

    public function mount()
    {

    }

    public function register()
    {
        $this->validate();
        // dd("valid");
        $meter = Meter::find($this->client_meter_id);

        if (!$meter) {
            session()->flash('error', 'Meter ID is not found in our records!');
        }

    }
    public function render()
    {
        return view('livewire.forms.meter-user-register-form');
    }
}
