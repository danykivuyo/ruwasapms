<?php

namespace App\Livewire;

use App\Models\MeterLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MeterLogsTable extends Component
{
    public $meter_logs;

    public function __construct()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            if ($user->role == "cbwso") {
                $this->meter_logs = MeterLog::all()
                    ->where('cbwso', $user->cbwso);

            } else if ($user->role == "district") {
                $this->meter_logs = MeterLog::all()
                    ->where('district', $user->district);

            } else if ($user->role == "region") {
                $this->meter_logs = MeterLog::all()
                    ->where('region', $user->region);

            } else if ($user->role == "admin") {
                $this->meter_logs = MeterLog::all();

            } else {
                $this->meter_logs;
            }
        } else {
            $this->meter_logs = [];
        }
    }
    public function render()
    {
        return view('livewire.meter-logs-table');
    }
}
