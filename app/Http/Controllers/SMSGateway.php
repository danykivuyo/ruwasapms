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
        $matches = null;
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
            $element = array_splice($matches, 1, 1);
            $matches[0] = $element[0];
        }
        return gettype($matches);
        if ($matches != null) {
            $cbwso = Cbwso::where('name', $meter->cbwso)->first();
            $customer = Customer::where('meter_id', $meter->meter_id)->first();
            $value = $matches[0];
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
