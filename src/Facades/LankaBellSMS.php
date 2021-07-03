<?php

namespace AppsDept\LaravelLankaBellSMS\Facades;

use Illuminate\Support\Facades\Facade;

class LankaBellSMS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lankabellsms';
    }
}
