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
     * @return ApiService current connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param ApiServiceInterface $connection - set new connection
     */
    public function setConnection(ApiServiceInterface $connection)
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

    private function roundTo($val)
    {
        return (int)(round($val, 2) * 100);
    }

    private function roundFrom($val)
    {
        return round($val / 100, 2);
    }
}
