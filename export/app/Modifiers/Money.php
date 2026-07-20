<?php

namespace App\Modifiers;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Exception\ParserException;
use Money\Formatter\IntlMoneyFormatter;
use Money\Parser\DecimalMoneyParser;
use NumberFormatter;
use Statamic\Facades\Site;
use Statamic\Modifiers\Modifier;

class Money extends Modifier
{
    /**
     * Format a decimal price string as localised currency.
     *
     * Usage: {{ price | money:USD }} or {{ price | money:USD:false }}
     * - param 0: ISO currency code (falls back to EUR when unknown/empty)
     * - param 1: whether to show the currency symbol (default true)
     */
    public function index($value, $params): string
    {
        $currencies = new ISOCurrencies();

        $currencyCode = strtoupper(trim((string) ($params[0] ?? 'EUR')));
        $currency = new Currency($currencyCode);

        // Guard against unknown/empty currency codes: never throw, fall back to EUR.
        if ($currencyCode === '' || ! $currencies->contains($currency)) {
            $currency = new Currency('EUR');
        }

        $showSymbol = $this->wantsSymbol($params[1] ?? true);
        $locale = Site::current()->locale();

        try {
            $money = (new DecimalMoneyParser($currencies))
                ->parse($this->normalizeAmount($value), $currency);
        } catch (ParserException) {
            // Malformed price: return the raw value rather than erroring the page.
            return (string) $value;
        }

        if ($showSymbol) {
            $numberFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

            return (new IntlMoneyFormatter($numberFormatter, $currencies))->format($money);
        }

        // IntlMoneyFormatter always renders the currency symbol, so format the
        // plain decimal ourselves, keeping the currency's subunit precision
        // (e.g. 0 decimals for JPY, 2 for EUR).
        $subunit = $currencies->subunitFor($currency);
        $decimal = (int) $money->getAmount() / (10 ** $subunit);

        $numberFormatter = new NumberFormatter($locale, NumberFormatter::DECIMAL);
        $numberFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, $subunit);
        $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $subunit);

        return $numberFormatter->format($decimal);
    }

    /**
     * Normalise loose input ("1.234,56", "1,234.56", "1234.56", int) into a
     * plain decimal string the parser understands.
     */
    private function normalizeAmount($value): string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return '0';
        }

        $lastComma = strrpos($value, ',');
        $lastDot = strrpos($value, '.');

        if ($lastComma !== false && $lastDot !== false) {
            // Whichever separator comes last is the decimal separator.
            $decimal = $lastComma > $lastDot ? ',' : '.';
            $thousands = $decimal === ',' ? '.' : ',';
            $value = str_replace($thousands, '', $value);
            $value = str_replace($decimal, '.', $value);
        } elseif ($lastComma !== false) {
            if (substr_count($value, ',') > 1) {
                // Multiple commas, no dots: thousands separators (e.g. "1,234,567").
                $value = str_replace(',', '', $value);
            } else {
                // Single comma, no dots: decimal separator (e.g. "1234,56").
                $value = str_replace(',', '.', $value);
            }
        }
        // Only dots (or none): already a valid decimal string.

        return $value;
    }

    private function wantsSymbol($param): bool
    {
        return ! in_array($param, [false, 'false', '0', 0, '', null], true);
    }
}
