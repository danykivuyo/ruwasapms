<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardIncome extends Component
{
    public $message;
    public $regions_income;

    public function income_today()
    {
        $this->message = "Today";
    }

    public function income_week()
    {
        $this->message = "This Week";
    }

    public function income_month()
    {
        $this->message = "This Month";
    }

    public function mount()
    {
        $this->message = "Today";
    }
    public function render()
    {
        return view('livewire.dashboard-income');
    }
}
