<?php

namespace DhanangPratama\Zodiac\Facades;

use Illuminate\Support\Facades\Facade;

class Zodiac extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}