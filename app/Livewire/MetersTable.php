<?php

namespace App\Livewire;

use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MetersTable extends Component
{
    public $meters;

    public function __construct()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('cbwso', $user->cbwso);
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('district', $user->district);
        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('region', $user->region);
        } else if ($user->role == "admin") {
            $this->meters = Meter::all();
        } else {
            $this->meters = [];
        }


    }
    public function render()
    {
        return view('livewire.meters-table');
    }
}
