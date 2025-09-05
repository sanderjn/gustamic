<?php

namespace App\Modifiers;

use Statamic\Modifiers\Modifier;
use Money\Money as MoneyObject;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

class Money extends Modifier
{
    public function index($value, $params)
    {
        $currencyCode = $params[0] ?? 'USD';
        
        // Handle the show symbol parameter
        $showSymbolParam = $params[1] ?? true;
        $showSymbol = !($showSymbolParam === false || 
                       $showSymbolParam === 'false' || 
                       $showSymbolParam === '0' || 
                       $showSymbolParam === 0 || 
                       $showSymbolParam === '' ||
                       $showSymbolParam === null);
        
        // Set appropriate locale based on currency
        $locale = $params[2] ?? $this->getLocaleForCurrency($currencyCode);

        // Convert to proper decimal value and then to cents
        $amount = (float) str_replace(',', '.', (string) $value);
        $amountInCents = (int) round($amount * 100);
        
        // Create Money object
        $currency = new Currency($currencyCode);
        $money = new MoneyObject($amountInCents, $currency);
        
        if ($showSymbol) {
            // Format with currency symbol using IntlMoneyFormatter
            $numberFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
            $numberFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
            $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new \Money\Currencies\ISOCurrencies());
            return $moneyFormatter->format($money);
        } else {
            // Format without currency symbol but with proper locale formatting
            $numberFormatter = new NumberFormatter($locale, NumberFormatter::DECIMAL);
            $numberFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
            $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new \Money\Currencies\ISOCurrencies());
            return $moneyFormatter->format($money);
        }
    }

    private function getLocaleForCurrency($currencyCode)
    {
        $localeMap = [
            'EUR' => 'nl_NL', // Dutch formatting for EUR (€ before, comma for decimals)
            'GBP' => 'en_GB',
            'USD' => 'en_US',
            'CAD' => 'en_CA',
            'AUD' => 'en_AU',
            'JPY' => 'ja_JP',
            'CHF' => 'de_CH',
            'SEK' => 'sv_SE',
            'NOK' => 'nb_NO',
            'DKK' => 'da_DK',
            'PLN' => 'pl_PL',
            'CZK' => 'cs_CZ',
            'HUF' => 'hu_HU',
            'RON' => 'ro_RO',
            'BGN' => 'bg_BG',
            'HRK' => 'hr_HR',
            'RSD' => 'sr_RS',
            'TRY' => 'tr_TR',
            'RUB' => 'ru_RU',
            'UAH' => 'uk_UA',
            'BRL' => 'pt_BR',
            'MXN' => 'es_MX',
            'ARS' => 'es_AR',
            'CLP' => 'es_CL',
            'COP' => 'es_CO',
            'PEN' => 'es_PE',
            'CNY' => 'zh_CN',
            'INR' => 'hi_IN',
            'KRW' => 'ko_KR',
            'THB' => 'th_TH',
            'VND' => 'vi_VN',
            'PHP' => 'fil_PH',
            'IDR' => 'id_ID',
            'MYR' => 'ms_MY',
            'SGD' => 'en_SG',
            'HKD' => 'zh_HK',
            'TWD' => 'zh_TW',
            'NZD' => 'en_NZ',
            'ZAR' => 'en_ZA',
        ];

        return $localeMap[$currencyCode] ?? 'en_US';
    }
}
