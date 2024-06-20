<?php

namespace App\Livewire;

use App\Models\Cbwso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CbwsosTable extends Component
{
    public $cbwsos;
    public $cbwso_id;

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

    public function delete($id)
    {
        $this->cbwso_id = $id;
        $cbwso = Cbwso::find($this->cbwso_id);
        if ($cbwso) {
            $cbwso->delete();
            session()->flash('message', 'Cbwso deleted successfully.');
        } else {
            session()->flash('error', 'Cbwso Not found');
        }
        $this->redirect('cbwso', navigate: true);
        return;
    }
    public function render()
    {
        return view('livewire.cbwsos-table');
    }
}
