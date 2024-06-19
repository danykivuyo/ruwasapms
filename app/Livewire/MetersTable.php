<?php

namespace App\Livewire;

use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MetersTable extends Component
{
    public $meters;
    public $meter_store;
    public $meter_type = "HHC";

    public $type;
    protected $queryString = [
        'type' => ['except' => ''],
    ];

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
        $this->meter_store = $this->meters;



    }

    public function get_pd_meters()
    {
        $this->meter_type = "PD";
        $this->meters = $this->meter_store
            ->where('type', "PD");
        $this->render();
    }

    public function get_hhc_meters()
    {
        $this->meter_type = "HHC";
        $this->meters = $this->meter_store
            ->where('type', "HHC");
        $this->render();
    }

    public function get_zn_meters()
    {
        $this->meter_type = "ZN";
        $this->meters = $this->meter_store
            ->where('type', "ZN");
        $this->render();

    }

    public function mount()
    {
        if ($this->type === "PD")
            $this->get_pd_meters();
        if ($this->type === "HHC")
            $this->get_hhc_meters();
        if ($this->type === "ZN")
            $this->get_zn_meters();
    }
    public function render()
    {
        return view('livewire.meters-table');
    }
}
