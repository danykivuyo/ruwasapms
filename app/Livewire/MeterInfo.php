<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Meter;
use Livewire\Component;

class MeterInfo extends Component
{
    public $meter;
    public $id;
    public $customers = [];
    public $customer = null;
    public $customer_id;
    public $customer_name = "";
    public $customer_phone = "";
    public $customer_tag_id = "";
    public $customers_tab_active = false;
    public $properties_tab_active = false;
    public $meter_logs_tab_active = false;
    public $edit_user_tab_active = true;

    public $meter_no;
    public $meter_lat;
    public $meter_lon;
    protected $queryString = [
        'id' => ['except' => ''],
    ];

    public function mount()
    {
        $this->meter = Meter::where('id', $this->id)->first();
        $this->meter_no = $this->meter->meter_number;
        $this->meter_lat = $this->meter->lat;
        $this->meter_lon = $this->meter->lon;
        $this->customers = Customer::all()
            ->where('meter_id', $this->meter->meter_id);
    }

    public function customers_tab()
    {
        $this->customers_tab_active = true;
        $this->properties_tab_active = false;
        $this->meter_logs_tab_active = false;
        $this->edit_user_tab_active = false;

    }

    public function properties_tab()
    {
        $this->customers_tab_active = false;
        $this->properties_tab_active = true;
        $this->meter_logs_tab_active = false;
        $this->edit_user_tab_active = false;

    }

    public function meter_logs_tab()
    {
        $this->customers_tab_active = false;
        $this->properties_tab_active = false;
        $this->meter_logs_tab_active = true;
        $this->edit_user_tab_active = false;

    }

    public function edit_user()
    {
        $this->customers_tab_active = false;
        $this->properties_tab_active = false;
        $this->meter_logs_tab_active = false;
        $this->edit_user_tab_active = true;
    }

    public function update_customer($id)
    {
        $this->customer = Customer::find($id);
        $this->customer_name = $this->customer->name;
        $this->customer_phone = $this->customer->phone;
        $this->customer_tag_id = $this->customer->tag_id;

    }

    public function delete($id)
    {

    }

    public function temper($id)
    {

    }

    public function status($id)
    {

    }

    public function off($id)
    {

    }

    public function properties_register()
    {

    }

    public function logs_register()
    {

    }

    public function edit_user_register()
    {
        $customer = Customer::find($this->customer_id)->first();
        $customer->name = $this->customer_name;
        $customer->phone = $this->customer_phone;


    }
    public function render()
    {
        return view('livewire.meter-info');
    }
}
