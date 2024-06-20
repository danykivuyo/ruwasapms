<?php

namespace App\Livewire\Forms;

use App\Models\Cbwso;
use App\Models\District;
use App\Models\Region;
use Livewire\Component;

class CbwsoRegisterForm extends Component
{
    public $regions;
    public $region;
    public $districts = [];
    public $district;
    public $name;
    public $tarrif;
    public $comment = "";

    protected $rules = [
        'name' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'tarrif' => 'required|string|max:255',
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
        $this->name = strtolower($this->name);
        Cbwso::create([
            "region" => $this->region,
            "district" => $this->district,
            "name" => $this->name,
            "tarrif" => $this->tarrif,
            "comment" => $this->comment
        ]);

        $this->reset([
            "name",
            "tarrif",
            "comment",
        ]);

        $this->update_districts($this->region);
        session()->flash('message', 'Registration successful!');
    }

    public function render()
    {
        return view('livewire.forms.cbwso-register-form');
    }
}
