<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardMeterLogs extends Component
{
    public $selector = [
        "HHC",
        "PD",
        "ZN"
    ];

    public $fetched_logs = [
        [
            "time" => "32 min",
            "message" => "Meter HHC005 Recharged 500/=",
            "status" => "success",
            "meter" => "HHC"
        ],
        [
            "time" => "56 min",
            "message" => "Meter HHC010 Recharged 1,000/=",
            "status" => "success",
            "meter" => "HHC"
        ],
        [
            "time" => "2 hrs",
            "message" => "Meter PD001 Turned OFF",
            "status" => "danger",
            "meter" => "PD"
        ],
        [
            "time" => "1 day",
            "message" => "Meter HHC010 Turned ON",
            "status" => "primary",
            "meter" => "HHC"
        ],
        [
            "time" => "1 week",
            "message" => "Meter HHC010 Turned ON",
            "status" => "primary",
            "meter" => "HHC"
        ],
        [
            "time" => "2 week",
            "message" => "Meter ZN001 Turned ON",
            "status" => "primary",
            "meter" => "ZN"
        ],
        [
            "time" => "2 week",
            "message" => "Meter HHC006 Turned ON",
            "status" => "primary",
            "meter" => "HHC"
        ],
        [
            "time" => "3 week",
            "message" => "Meter HHC010 Turned ON",
            "status" => "primary",
            "meter" => "HHC"
        ],
        [
            "time" => "3 week",
            "message" => "Meter PD001 Turned ON",
            "status" => "primary",
            "meter" => "PD"
        ],
    ];

    public $logs;

    public $meter_type;

    public function __construct()
    {
        $this->get_all_meters();
    }

    public function fetchLogs($meter_type)
    {
        if ($meter_type == "All Meters") {
            //fetch logs from database
            $this->get_all_meters();
        }

        if ($meter_type == "HHC Meters") {
            //fetch logs from database
            $this->get_hhc_meters();
        }

        if ($meter_type == "PD Meters") {
            //fetch logs from database
            $this->get_pd_meters();
        }

        if ($meter_type == "ZN Meters") {
            //fetch logs from database
            $this->get_zn_meters();
        }

    }
    public function get_all_meters()
    {
        $this->logs = [];
        $this->logs = $this->fetched_logs;
        $this->meter_type = "All Meters";
    }

    public function get_hhc_meters()
    {

        $this->logs = [];
        foreach ($this->fetched_logs as $log) {
            if ($log['meter'] === $this->selector[0]) {
                $this->logs[] = $log;
            }
        }
        $this->meter_type = $this->selector[0] . " Meters";
    }

    public function get_pd_meters()
    {
        $this->logs = [];
        foreach ($this->fetched_logs as $log) {
            if ($log['meter'] === $this->selector[1]) {
                $this->logs[] = $log;
            }
        }
        $this->meter_type = $this->selector[1] . " Meters";
    }

    public function get_zn_meters()
    {
        $this->logs = [];
        foreach ($this->fetched_logs as $log) {
            if ($log['meter'] === $this->selector[2]) {
                $this->logs[] = $log;
            }
        }
        $this->meter_type = $this->selector[2] . " Meters";
    }
    public function render()
    {
        return view('livewire.dashboard-meter-logs');
    }
}
