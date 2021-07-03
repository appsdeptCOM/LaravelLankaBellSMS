<?php

namespace AppsDept\LaravelLankaBellSMS;

use Exception;
use Illuminate\Support\Facades\Http;

class LankaBellSMS
{


    public static function TwoFactorAuth($number)
    {
        if (\gettype($number) != 'string') throw new Exception('Phone number should be a string');
        if (\strlen($number) < 9)  throw new Exception('Minimum destination number lenth is 9.');

        $LB_KEY = config('lankabell.LB_Key');
        $TwoAuthCode = rand(100000, 999999);

        $response =  Http::withHeaders([
            'Authorization' => $LB_KEY,
        ])->get('http://smsm.lankabell.com:4090/Sms.svc/SecureSendSms', [
            'phoneNumber' => $number,
            'smsMessage' => "Your verification code is {$TwoAuthCode}"
        ]);

        $status =  $response->json()['Status'];
        if ($status == "412" || $status == "410") return "Invalid LB Secure Key";
        if ($status == "601") return "Minimum destination number lenth is 9.";


        if ($status == "200") return $TwoAuthCode;

        return $response;
    }
}
