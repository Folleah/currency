<?php

namespace Folleah\Currency;

class ConverterLogic
{
    private static function roundTo($val)
    {
        return (int)(round($val, 4) * 10000);
    }

    private static function roundFrom($val)
    {
        return round($val / 10000, 2);
    }

    public static function convert($currentCurrencyRelation, $currencyRelation, $value) {
        $val = 
            self::roundTo($currencyRelation) 
            * self::roundTo($value)
            / self::roundTo($currentCurrencyRelation);

        return self::roundFrom($val);
    }
}
