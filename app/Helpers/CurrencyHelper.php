<?php

namespace App\Helpers;

use Illuminate\Support\Number;

class CurrencyHelper
{
    public static function format($amount, $currency = 'PHP')
    {
        return Number::currency($amount, $currency);
    }
}
