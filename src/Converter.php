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

        $val = ConverterLogic::convert(
            $allCurrencies[$currentCurrency],
            $allCurrencies[$currency],
            $value
        );
        return $val;
    }
}
