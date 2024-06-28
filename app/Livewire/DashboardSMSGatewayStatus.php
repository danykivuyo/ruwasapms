<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardSMSGatewayStatus extends Component
{
    public $logs = [];
    public $url = 'https://sms.droid.co.tz/get-dash';
    public function render()
    {
        return view('livewire.dashboard-s-m-s-gateway-status');
    }

    public function mount()
    {
        $response = file_get_contents($this->url);
        if ($response === FALSE) {
            $this->logs = [];
        } else {
            $arr = array();
            $logs = json_decode($response, true)['messages'];
            foreach ($logs as $log) {
                $smsParts = explode('#', $log['sms']);
                if (isset($smsParts[1])) {
                    array_push($this->logs, $log);
                } else {

                }
            }
        }

    }

    public function fetchStatus()
    {
        try {
            $response = file_get_contents($this->url);
            if ($response === FALSE) {
                $this->logs = [];
            } else {
                $arr = array();
                $logs = json_decode($response, true)['messages'];
                foreach ($logs as $log) {
                    $smsParts = explode('#', $log['sms']);
                    if (isset($smsParts[1])) {
                        array_push($this->logs, $log);
                    } else {

                    }
                }
            }
        } catch (Exception $e) {
            $this->logs = [];
        }
    }
}
