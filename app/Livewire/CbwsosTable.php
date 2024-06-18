<?php

namespace App\Livewire;

use App\Models\Cbwso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CbwsosTable extends Component
{
    public $cbwsos;

    public function __construct()
    {   
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->cbwsos = Cbwso::all()
                ->where('cbwso', $user->cbwso);
        } else if ($user->role == "district") {
            $this->cbwsos = Cbwso::all()
                ->where('district', $user->district);
        } else if ($user->role == "region") {
            $this->cbwsos = Cbwso::all()
                ->where('region', $user->region);
        } else if ($user->role == "admin") {
            $this->cbwsos = Cbwso::all();
        } else {
            $this->cbwsos = [];
        }
    }
    public function render()
    {
        return view('livewire.cbwsos-table');
    }
}
