<?php

namespace App\Livewire\Forms;

use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $mobile;
    public $cbwso;
    public $ward;
    public $region;
    public $district;
    public $password_confirmation;
    public $regions;
    public $check;
    public $districts = [];

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'mobile' => 'required|numeric',
        'check' => 'required'
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

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'mobile' => $this->mobile,
            'region' => $this->region,
            'district' => $this->district,
            'cbwso' => strtolower($this->cbwso),
        ]);

        session()->flash('message', 'Registration successful!');
        // $this->reset();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.forms.register-form');
    }
}
