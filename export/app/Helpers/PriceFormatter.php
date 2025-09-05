<?php

namespace App\Helpers;

use Money\Money;
use Money\Currency;
use Money\Currencies\ISOCurrencies;

class PriceFormatter
{
    private static $currencies = [
        'USD' => 'USD',
        'EUR' => 'EUR',
        'GBP' => 'GBP',
        'CAD' => 'CAD',
        'AUD' => 'AUD',
        'JPY' => 'JPY',
        'CHF' => 'CHF',
        'SEK' => 'SEK',
        'NOK' => 'NOK',
        'DKK' => 'DKK',
    ];

    private static $symbols = [
        'USD' => '$',
        'EUR' => '€',
        'GBP' => '£',
        'CAD' => 'C$',
        'AUD' => 'A$',
        'JPY' => '¥',
        'CHF' => 'CHF',
        'SEK' => 'kr',
        'NOK' => 'kr',
        'DKK' => 'kr',
    ];

    private static $locales = [
        'USD' => 'en_US',
        'EUR' => 'de_DE', // German locale uses comma as decimal separator
        'GBP' => 'en_GB',
        'CAD' => 'en_CA',
        'AUD' => 'en_AU',
        'JPY' => 'ja_JP',
        'CHF' => 'de_CH',
        'SEK' => 'sv_SE', // Swedish locale uses comma as decimal separator
        'NOK' => 'nb_NO', // Norwegian locale uses comma as decimal separator
        'DKK' => 'da_DK', // Danish locale uses comma as decimal separator
    ];

    public static function format($amount, $currency = 'USD', $showSymbol = true)
    {
        if (!isset(self::$currencies[$currency])) {
            $currency = 'USD';
        }

        $currencyCode = self::$currencies[$currency];
        $locale = self::$locales[$currency];

        // Use NumberFormatter for locale-aware formatting
        $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
        $formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, $currency === 'JPY' ? 0 : 2);

        $formatted = $formatter->format($amount);

        // Add currency symbol if requested
        if ($showSymbol && isset(self::$symbols[$currency])) {
            $symbol = self::$symbols[$currency];

            if ($currency === 'CHF') {
                $formatted = $formatted . ' ' . $symbol;
            } else {
                $formatted = $symbol . $formatted;
            }
        }

        return $formatted;
    }
}
