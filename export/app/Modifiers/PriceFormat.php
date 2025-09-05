<?php

namespace App\Modifiers;

use Statamic\Modifiers\Modifier;
use App\Helpers\PriceFormatter;

class PriceFormat extends Modifier
{
    public function index($value, $params, $context)
    {
        $currency = $params[0] ?? 'USD';
        $showSymbol = isset($params[1]) ? $params[1] === 'true' : true;

        return PriceFormatter::format($value, $currency, $showSymbol);
    }
}
