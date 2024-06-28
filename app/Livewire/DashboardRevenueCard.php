<?php

namespace App\Livewire;

use App\Models\Cbwso;
use App\Models\DailyIncome;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardRevenueCard extends Component
{
    public $daily_income;
    public $monthly_income;
    public $yearly_income;
    public $income;
    public $badge = "Today";
    public $last_income = 0;
    public $increase;
    public function daily()
    {
        $this->income = $this->daily_income;
        $yesterday = Carbon::yesterday()->toDateString();

        $this->last_income = DailyIncome::query()
            ->whereDate('created_at', $yesterday)
            ->sum('income');

        if ($this->last_income > 0) {
            $this->increase = number_format(($this->income / $this->last_income * 100), 0);
        } else if ($this->income > 0) {
            $this->increase = 100;
        } else {
            $this->increase = 0;
        }

        $this->badge = "Today";
    }

    public function monthly()
    {
        $this->fetch();
        $this->income = $this->monthly_income;
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $this->last_income = DailyIncome::query()
            ->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])
            ->sum('income');

        if ($this->last_income > 0) {
            $this->increase = number_format(($this->income / $this->last_income * 100), 0);
        } else if ($this->income > 0) {
            $this->increase = 100;
        } else {
            $this->increase = 0;
        }

        $this->badge = "This Month";
    }

    public function yearly()
    {
        $this->fetch();
        $this->income = $this->yearly_income;
        $startOfLastYear = Carbon::now()->subYear()->startOfYear();
        $endOfLastYear = Carbon::now()->subYear()->endOfYear();

        $this->last_income = DailyIncome::query()
            ->whereBetween('created_at', [$startOfLastYear, $endOfLastYear])
            ->sum('income');

        if ($this->last_income > 0) {
            $this->increase = number_format(($this->income / $this->last_income * 100), 0);
        } else if ($this->income > 0) {
            $this->increase = 100;
        } else {
            $this->increase = 0;
        }

        $this->badge = "This Year";
    }

    public function mount()
    {
        $this->fetch();
        $this->income = $this->daily_income;
        $yesterday = Carbon::yesterday()->toDateString();

        $this->last_income = DailyIncome::query()
            ->whereDate('created_at', $yesterday)
            ->sum('income');

        if ($this->last_income > 0) {
            $this->increase = number_format(($this->income / $this->last_income * 100), 0);
        } else if ($this->income > 0) {
            $this->increase = 100;
        } else {
            $this->increase = 0;
        }

        $this->badge = "Today";

    }

    public function fetch()
    {
        $user = User::find(Auth::user()->id)->first();
        if ($user->role == "cbwso") {
            $this->daily_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('monthly_income');

            $this->yearly_income = Cbwso::query()
                ->where('cbwso', $user->cbwso)
                ->sum('yearly_income');

        } else if ($user->role == "district") {
            $this->daily_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('monthly_income');

            $this->yearly_income = Cbwso::query()
                ->where('district', $user->district)
                ->sum('yearly_income');

        } else if ($user->role == "region") {
            $this->daily_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('monthly_income');

            $this->yearly_income = Cbwso::query()
                ->where('region', $user->region)
                ->sum('yearly_income');

        } else if ($user->role == "admin") {
            $this->daily_income = Cbwso::query()
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->sum('monthly_income');

            $this->yearly_income = Cbwso::query()
                ->sum('yearly_income');


        } else if ($user->role == "country") {
            $this->daily_income = Cbwso::query()
                ->sum('daily_income');

            $this->monthly_income = Cbwso::query()
                ->sum('monthly_income');

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
