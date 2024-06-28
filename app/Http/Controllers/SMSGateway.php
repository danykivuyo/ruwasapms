<?php

namespace App\Http\Controllers;

use App\Models\Cbwso;
use App\Models\Customer;
use App\Models\Meter;
use Illuminate\Http\Request;

class SMSGateway extends Controller
{
    //
    private $meter_number;
    private $balance;
    private $meter_id;
    public function meter(Request $request)
    {
        $this->meter_number = substr($request->from_number, -9);
        $this->meter_number = "0" + $this->meter_number;
        $meter = Meter::where('meter_number', $this->meter_number)->first();
        preg_match('/#(\d+\.\d+)\r\n#0$/', $request->sms, $match);
        $matches = array();
        if (isset($match[0])) {
            $matches = $match;
        } else {
            preg_match('/\d+\.\d+/', $request->sms, $match);
            if (isset($match[0])) {
                $matches = $match;
            } else {
                preg_match('/#(\d+\.\d{2})\\\\r\\\\n/', $request->sms, $match);
                if (isset($match[0])) {
                    $matches = $match;
                }
            }
        }
        if (isset($matches[1])) {
            $matches = $matches[1];
        }
        return $matches;
        if (!isset($matches)) {
            $cbwso = Cbwso::where('name', $meter->cbwso)->first();
            $customer = Customer::where('meter_id', $meter->meter_id)->first();
            $value = $matches;
            $meter->balance = $value;
            $customer->balance = number_format($value * $cbwso->tarrif, 2);
            $customer->save();
            $meter->save();

            return [
                'success' => true,
                'message' => "Successfully updated"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Empty"
            ];
        }
    }
}
