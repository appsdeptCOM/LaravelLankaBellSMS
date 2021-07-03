<?php

namespace AppsDept\LaravelLankaBellSMS;

use Exception;
use Illuminate\Support\Facades\Http;

class LankaBellSMS
{
    public static function SendText(string $number, string $message)
    {
        if (\gettype($number) != 'string') throw new Exception('Phone number should be a string!');
        if (\gettype($message) != 'string') throw new Exception('Message should be a string!');
        if (\strlen($number) < 9)  throw new Exception('Minimum destination number length is 9.');

        $LB_KEY = config('lankabell.LB_Key');
        $LB_PORT = config('lankabell.LB_Port');

        $response =  Http::withHeaders([
            'Authorization' => $LB_KEY,
        ])->get("http://smsm.lankabell.com:{$LB_PORT}/Sms.svc/SecureSendSms", [
            'phoneNumber' => $number,
            'smsMessage' => $message
        ]);

        $status =  $response->json()['Status'];
        if ($status == "412" || $status == "410") throw new Exception('Invalid LankaBell LB Secure Key!');
        if ($status == "601") throw new Exception('Minimum destination number length is 9.');

        if ($status == "200") return true;
        throw new Exception($response);
    }

    public static function TwoFactorAuth(string $number)
    {
        if (\gettype($number) != 'string') throw new Exception('Phone number should be a string!');
        if (\strlen($number) < 9)  throw new Exception('Minimum destination number length is 9.');

        $LB_KEY = config('lankabell.LB_Key');
        $LB_PORT = config('lankabell.LB_Port');

        $TwoAuthCode = rand(100000, 999999);

        $response =  Http::withHeaders([
            'Authorization' => $LB_KEY,
        ])->get("http://smsm.lankabell.com:{$LB_PORT}/Sms.svc/SecureSendSms", [
            'phoneNumber' => $number,
            'smsMessage' => "Your verification code is {$TwoAuthCode}"
        ]);

        $status =  $response->json()['Status'];
        if ($status == "412" || $status == "410") throw new Exception('Invalid LankaBell LB Secure Key!');
        if ($status == "601") throw new Exception('Minimum destination number length is 9.');

        if ($status == "200") return $TwoAuthCode;
        throw new Exception($response);
    }
}
