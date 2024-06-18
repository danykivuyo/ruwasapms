<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardCustomersCard extends Component
{
    public $message = "All Customers";
    public $customers;
    public $active_customers;
    public $pd_customers = 32;
    public $hhc_customers = 19;

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
    public function render()
    {
        return view('livewire.dashboard-customers-card');
    }
}
