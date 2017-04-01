<?php

namespace Folleah\Currency;

use Folleah\Currency\ConverterLogic;
use Folleah\Currency\ApiServices\ApiServiceInterface;

class Converter
{
    private $connection;

    /**
     * Create a new converter
     * @param ApiServiceInterface $connection
     */
    public function __construct(ApiServiceInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Convert $currentCurrency to $currency in $value
     * @param String $currentCurrency
     * @param Float $value
     * @param String $currency
     */
    public function convert($currentCurrency, $value, $currency)
    {
        $allCurrencies = $this->connection->getAllCurrencies();

        $val = 
            $this->roundTo($allCurrencies[$currency])
            * $this->roundTo($value)
            / $this->roundTo($allCurrencies[$currentCurrency]);
    
        return $this->roundFrom($val);
    }

    /**
     * @return Array - return available currencies array in ISO 4217 format
     */
    public function getAvailableCurrencies()
    {
        return $this->connection->getAvailableCurrencies();
    }

    /**
     * @param String $currency - currency code in ISO 4217 format
     * @return Boolean true | false
     */
    public function isCurrencyAvailable($currency)
    {
        return $this->connection->isCurrencyAvailable($currency);
    }

    /**
     * Typecasting float currency value to integer
     * @param Float $val - value
     */
    private function roundTo($val)
    {
        return (int)(round($val, 2) * 100);
    }

    /**
     * Typecasting integer currency value to float
     * @param Float $val - value
     */
    private function roundFrom($val)
    {
        return round($val / 100, 2);
    }
}
