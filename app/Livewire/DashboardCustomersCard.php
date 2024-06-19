<?php

namespace App\Livewire;

use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCustomersCard extends Component
{
    public $message = "All Customers";
    public $customers;
    public $active_customers;
    public $pd_customers = 32;
    public $hhc_customers = 19;
    public $meters;
    public $active_meters;

    public $pd_active_customers = 12;
    public $hhc_active_customers = 8;

    public function __construct()
    {
        $this->get_all_customers();
    }
    public function get_all_customers()
    {
        $this->message = "All Customers";
        $this->customers = $this->pd_customers + $this->hhc_customers;
        $this->active_customers = $this->pd_active_customers + $this->hhc_active_customers;
    }

    public function get_hhc_customers()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('cbwso', $user->cbwso);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('cbwso', $user->cbwso);
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('district', $user->district);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('district', $user->district);
        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('region', $user->region);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('region', $user->region);
        } else if ($user->role == "country") {
            $this->meters = Meter::all();
            $this->active_meters = Meter::all()
                ->where('status', 1);
        } else if ($user->role == "admin") {
            $this->meters = Meter::all();
            $this->active_meters = Meter::all()
                ->where('status', 1);
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
            return;
        }

        $this->hhc_customers = $this->meters
            ->where('type', "HHC")
            ->count();
        $this->hhc_active_customers = $this->active_meters
            ->where('type', "HHC")
            ->count();
        $this->message = "HHC Customers";
        $this->customers = $this->hhc_customers;
        $this->active_customers = $this->hhc_active_customers;
    }

    public function get_pd_customers()
    {
        $this->message = "PD Customers";
        $this->customers = $this->pd_customers;
        $this->active_customers = $this->pd_active_customers;
    }

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->meters = Meter::all()
                ->where('cbwso', $user->cbwso);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('cbwso', $user->cbwso);
        } else if ($user->role == "district") {
            $this->meters = Meter::all()
                ->where('district', $user->district);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('district', $user->district);
        } else if ($user->role == "region") {
            $this->meters = Meter::all()
                ->where('region', $user->region);
            $this->active_meters = Meter::all()
                ->where('status', 1)
                ->where('region', $user->region);
        } else if ($user->role == "country") {
            $this->meters = Meter::all();
            $this->active_meters = Meter::all()
                ->where('status', 1);
        } else if ($user->role == "admin") {
            $this->meters = Meter::all();
            $this->active_meters = Meter::all()
                ->where('status', 1);
        } else {
            $this->meters = 0;
            $this->active_meters = 0;
            return;
        }

        $this->hhc_customers = $this->meters
            ->where('type', "HHC")
            ->count();
        $this->hhc_active_customers = $this->active_meters
            ->where('type', "HHC")
            ->count();

    }
    public function render()
    {
        return view('livewire.dashboard-customers-card');
    }
}
