<?php

namespace App\Livewire;

use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardMetersCard extends Component
{
    public $hhc_meters = 19;
    public $pd_meters = 17;
    public $zn_meters = 2;
    public $hhc_active_meters = 8;
    public $pd_active_meters = 6;
    public $zn_active_meters = 0;
    public $active_meters;
    public $meters;
    public $message = "All Meters";

    public function mount()
    {
        $this->get_all_meters();
    }

    public function get_all_meters()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('cbwso', $user->cbwso)
                ->count();
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('cbwso', $user->cbwso)
                ->count();
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('district', $user->district)
                ->count();
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('district', $user->district)
                ->count();
        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('region', $user->region)
                ->count();
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('region', $user->region)
                ->count();
        } else if ($user->role == "country") {
            $this->meters = Meter::all()
                ->count();
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->count();
        } else if ($user->role == "admin") {
            $this->meters = Meter::all()
                ->count();
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->count();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
        }

        $this->message = "All Meters";
    }

    public function get_hhc_meters()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('type', 'HHC')
                ->where('cbwso', $user->cbwso)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'HHC')
                ->where('status', 1)
                ->where('cbwso', $user->cbwso)
                ->count();
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('type', 'HHC')
                ->where('district', $user->district)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'HHC')
                ->where('status', 1)
                ->where('district', $user->district)
                ->count();
        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('type', 'HHC')
                ->where('region', $user->region)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'HHC')
                ->where('status', 1)
                ->where('region', $user->region)
                ->count();
        } else if ($user->role == "admin") {
            $this->meters = Meter::all()
                ->where('type', 'HHC')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'HHC')
                ->where('status', 1)
                ->count();
        } else if ($user->role == "country") {
            $this->meters = Meter::all()
                ->where('type', 'HHC')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'HHC')
                ->where('status', 1)
                ->count();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
        }

        $this->message = "HHC Meters";
    }

    public function get_pd_meters()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('type', 'PD')
                ->where('cbwso', $user->cbwso)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'PD')
                ->where('cbwso', $user->cbwso)
                ->where('status', 1)
                ->count();
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('type', 'PD')
                ->where('district', $user->cbwso)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'PD')
                ->where('district', $user->district)
                ->where('status', 1)
                ->count();
        } else if ($user->role == "admin") {
            $this->meters = Meter::all()
                ->where('type', 'PD')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'PD')
                ->where('status', 1)
                ->count();
        } else if ($user->role == "country") {
            $this->meters = Meter::all()
                ->where('type', 'PD')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'PD')
                ->where('status', 1)
                ->count();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
        }
        $this->message = "PD Meters";
    }

    public function get_zn_meters()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('type', 'ZN')
                ->where('cbwso', $user->cbwso)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'ZN')
                ->where('cbwso', $user->cbwso)
                ->where('status', 1)
                ->count();

        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('type', 'ZN')
                ->where('district', $user->district)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'ZN')
                ->where('district', $user->district)
                ->where('status', 1)
                ->count();

        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('type', 'ZN')
                ->where('region', $user->region)
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'ZN')
                ->where('region', $user->region)
                ->where('status', 1)
                ->count();

        } else if ($user->role == "country") {
            $this->meters = Meter::all()
                ->where('type', 'ZN')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'ZN')
                ->where('status', 1)
                ->count();
        } else if ($user->role == "admin") {
            $this->meters = Meter::all()
                ->where('type', 'ZN')
                ->count();
            $this->active_meters = Meter::all()
                ->where('type', 'ZN')
                ->where('status', 1)
                ->count();
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
        }

        $this->message = "ZN Meters";
    }

    public function render()
    {
        return view('livewire.dashboard-meters-card');
    }
}
