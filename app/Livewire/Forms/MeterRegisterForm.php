<?php

namespace App\Livewire\Forms;

use App\Http\Controllers\SMSController;
use App\Models\Meter;
use App\Models\Region;
use Livewire\Component;

class MeterRegisterForm extends Component
{
    public $regions;
    public $region;
    public $districts = [];
    public $district;
    public $cbwso;
    public $meter_id;
    public $meter_number;
    public $type;
    public $lat;
    public $lon;
    public $comment;

    protected $rules = [
        'meter_id' => 'required|string|string|max:255|unique:meters|min:4',
        'meter_number' => 'required|string|string|max:255|unique:meters',
        'cbwso' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'lat' => 'required|string|max:255',
        'lon' => 'required|string|max:255'
    ];
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
    }

    public function updatedRegion($value)
    {
        // $this->emit('updatedRegion');
        $this->update_districts($value);
        $this->region = $value;

    }

    public function update_region($value)
    {
        $this->update_districts($value);
    }

    public function updated($name, $value)
    {
        $this->update_districts($value);
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

    public function register()
    {
        $this->validate();
        $this->cbwso = strtolower($this->cbwso);
        Meter::create([
            'meter_id' => $this->meter_id,
            'meter_number' => $this->meter_number,
            'cbwso' => strtolower($this->cbwso),
            'region' => $this->region,
            'district' => $this->district,
            'balance' => '',
            'type' => $this->type,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'comment' => $this->comment

        ]);

        $sms = new SMSController;

        $sms->meter_register_sms($this->meter_id, $this->meter_number, 0);

        $this->reset([
            'meter_id',
            'meter_number',
            'cbwso',
            'type',
            'lat',
            'lon',
            'comment',
        ]);

        $this->update_districts($this->region);
        session()->flash('message', 'Registration successful!');
    }

    public function render()
    {
        return view('livewire.forms.meter-register-form');
    }
}
