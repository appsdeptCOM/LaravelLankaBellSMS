<?php

namespace AppsDept\LaravelLankaBellSMS;

class LankaBellSMS
{

    public function __construct()
    { }

    public function getKey()
    {
        return config('lankabell.LB_Key');
    }
}
