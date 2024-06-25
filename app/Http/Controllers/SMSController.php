<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    //
    protected $api_key;
    protected $secret_key;
    public $sms_separator;

    public function __construct()
    {
        $this->api_key = env('BEEM_API_KEY');
        $this->secret_key = env('BEEM_SECRET_KEY');
        $this->sms_separator = ':';
    }

    public function phone_format($number)
    {
        // Remove non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);

        // Check if the number starts with '0' and has 10 digits
        if (strlen($number) === 10 && $number[0] === '0') {
            // Replace '0' with '255'
            $number = '255' . substr($number, 1);
            return $number;

        } elseif (strlen($number) === 9 && $number[0] != 0) {
            $number = '255' . $number;
            return $number;

        } elseif (strlen($number) === 13 && substr($number, 0, 4) === '+255') {
            // If the number starts with '+255', remove the '+'
            return substr($number, 1);

        } elseif (strlen($number) === 12 && substr($number, 0, 3) === '255') {
            return $number;

        } else {
            // If the number is not in the expected format, return false or handle accordingly
            return false;
        }
    }

    public function hhc_recharge_sms($meter_number, $balance)
    {
        $api_key = $this->api_key;
        $secret_key = $this->secret_key;

        $meter_number = $this->phone_format($meter_number);

        $postData = array(
            'source_addr' => 'RUWASA-MUST',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => 'RE:' . $balance,
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($meter_number))]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            )
        );

        $response = curl_exec($ch);

        return $response;
    }

    public function send_clear_command($meter_number)
    {
        $api_key = $this->api_key;
        $secret_key = $this->secret_key;

        $meter_number = $this->phone_format($meter_number);

        $postData = array(
            'source_addr' => 'RUWASA-MUST',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => 'CLEAR',
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($meter_number))]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            )
        );

        $response = curl_exec($ch);

        return $response;
    }

    public function send_control_number($customer_number, $meter_id, $control_number, $balance = 0)
    {
        $api_key = $this->api_key;
        $secret_key = $this->secret_key;

        $customer_number = $this->phone_format($customer_number);
        if ($balance == 0) {
            $sms = 'Ndugu Mteja, Usajili wako mita namba ' . $meter_id . ' umekamilika. Namba ya Malipo ni ' . $control_number;
        } else {
            $sms = 'Ndugu Mteja, Usajili wako mita namba ' . $meter_id . ' umekamilika. Namba ya Malipo ni ' . $control_number . '. Salio la kuanzia ' . $balance;
        }
        $postData = array(
            'source_addr' => 'RUWASA-MUST',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => $sms,
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($customer_number))]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            )
        );

        $response = curl_exec($ch);

        return $response;
    }

    public function meter_register_sms($meter_id, $meter_no, $starting_amount)
    {
        $api_key = $this->api_key;
        $secret_key = $this->secret_key;

        if ($meter_id[0] === "H") {
            $sms = 'USR' . $this->sms_separator . $meter_id . $this->sms_separator . $starting_amount;
        } elseif ($meter_id[0] === "P") {
            $sms = 'USR' . $this->sms_separator . $meter_id;
        } elseif ($meter_id[0] === "Z") {
            $sms = 'USR' . $this->sms_separator . $meter_id;
        } else {
            $sms = null;
        }

        if ($sms === null)
            return false;

        $meter_no = $this->phone_format($meter_no);

        $postData = array(
            'source_addr' => 'DROID',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => $sms,
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($meter_no))]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            )
        );

        $response = curl_exec($ch);

        return $response;
    }

    public function underStockWarning($product_name, $quantity)
    {
        //beemAfrica product finished

        $api_key = $this->api_key;
        $secret_key = $this->secret_key;

        // $admin_no = $this->phone_format(json_decode(User::find(1)->first()->toJson())->phone);
        $admin_no = "0624026126";

        $minimum = config('settings.warning_quantity');

        $app_name = config('settings.app_name');

        // $branch_name = json_decode(Branch::where('id', json_decode(auth()->user()->branches()->get()->toJson(JSON_PRETTY_PRINT))[0]->pivot->branch_id)->first()->toJson())->name;
        $branch_name = "BRANCH";
        if (app()->getLocale() == "sw") {
            $postData = array(
                'source_addr' => 'RUWASA-MUST',
                'encoding' => 0,
                'schedule_time' => '',
                'message' => "$app_name: Bidhaa $product_name ipo kiwango chini ya $minimum ($quantity) katika duka $branch_name, tafadhali ongeza bidhaa kuepusha usumbufu kwa wateja wako.",
                'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($admin_no))]
            );
        } else {
            $postData = array(
                'source_addr' => 'RUWASA-MUST',
                'encoding' => 0,
                'schedule_time' => '',
                'message' => "$app_name: The quantity of $product_name is below $minimum ($quantity) at $branch_name shop, please add stock to avoid trouble to your valuable customers.",
                'recipients' => [array('recipient_id' => '1', 'dest_addr' => strval($admin_no))]
            );
        }


        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            )
        );

        $response = curl_exec($ch);

        return $response;
    }
}


