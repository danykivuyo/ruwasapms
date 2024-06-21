<?php

namespace App\Livewire;

use App\Models\Cbwso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardRevenueCard extends Component
{
    public $daily_income;
    public $monthly_income;
    public $yearly_income;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role == "cbwso") {
            $this->daily_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('daily_income');
            $this->monthly_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('daily_income');

            $this->yearly_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('yearly_income');

        } else if ($user->role == "district") {
            $this->daily_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('daily_income');

            $this->yearly_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('yearly_income');

        } else if ($user->role == "region") {
            $this->daily_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('daily_income');

            $this->yearly_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('yearly_income');

        } else if ($user->role == "admin") {
            $this->daily_income = Cbwso::query()
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->sum('daily_income');

            $this->yearly_income = Cbwso::query()
                ->sum('yearly_income');


        } else if ($user->role == "country") {
            $this->daily_income = Cbwso::query()
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->sum('daily_income');

            $this->yearly_income = Cbwso::query()
                ->sum('yearly_income');
        } else {
            $this->daily_income = "Nill";
            $this->monthly_income = "Nill";
            $this->yearly_income = "Nill";
        }
    }
    public function render()
    {
        return view('livewire.dashboard-revenue-card');
    }
}
