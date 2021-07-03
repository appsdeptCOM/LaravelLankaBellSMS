<?php

return [

    /*
    |--------------------------------------------------------------------------
    | LankaBell Secure API Authentication Header Key
    |--------------------------------------------------------------------------
    |
    | You can generate your Secure Key by visiting http://smsm.lankabell.com/API/WebApiKey.aspx
    | Use the API details received by the initial email from Lankabell
    |
    */

    'LB_Key' => env('LB_SECURE_KEY', null),
    'LB_Port' => env('LB_API_PORT', null),
];
