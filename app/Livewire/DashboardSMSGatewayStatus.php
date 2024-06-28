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
            $this->logs = json_decode($response, true)['messages'];
        }

    }

    public function fetchStatus()
    {
        $response = file_get_contents($this->url);
        if ($response === FALSE) {
            $this->logs = [];
        } else {
            $this->logs = json_decode($response, true)['messages'];
        }
    }
}
