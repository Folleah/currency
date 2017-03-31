<?php

namespace Folleah\Currency;

use Money\Currency;
use Money\Money;

class Converter
{
    protected $connection;
    protected $baseCurrency;

    /**
     * Create a new API connection
     * @param $serviceName String
     * @param $params Array
     */
    public function __construct(ApiConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return ApiConnection current connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param ApiConnection $connection - set new connection
     */
    public function setConnection(ApiConnection $connection)
    {
        $this->connection = $connection;
    }

    public function setCurrentCurrency($currency)
    {
        $this->baseCurrency = $currency;
    }

    public function getCurrentCurrency()
    {
        return $this->baseCurrency;
    }

    public function 
}
