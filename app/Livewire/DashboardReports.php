<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardReports extends Component
{

    public $message;
    public $hhc_data;
    public $pd_data;
    public $zn_data;
    public function get_all_meters()
    {
        $this->message = "All Meters";
    }

    public function get_hhc_meters()
    {
        $this->message = "HHC Meters";
    }

    public function get_pd_meters()
    {
        $this->message = "PD Meters";
    }

    public function get_zn_meters()
    {
        $this->message = "ZN Meters";
    }

    public function mount()
    {
        $this->message = "All Meters";
        $this->hhc_data = [0, 0, 0, 0, 0, 0, 10];
        $this->pd_data = [0, 0, 0, 0, 0, 0, 0];
        $this->zn_data = [0, 0, 0, 0, 0, 0, 0];
    }

    public function render()
    {
        return view('livewire.dashboard-reports');
    }
}
