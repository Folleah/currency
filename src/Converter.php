<?php

namespace Folleah\Currency;

class Converter
{
    private $connection;

    /**
     * Create a new converter
     * @param $connection ApiConnection
     * @param $currency String - current currency
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

    public function from($currency, $value)
    {
        $this->currentCurrency = $currency;
        return $this;
    }

    public function convertTo($currency)
    {
        $val = $this->currentCurrency;

        return $val;
    }

    protected function currencyRoundTo($val)
    {
        return round($val, 2) * 100;
    }

    protected function currencyRoundFrom($val)
    {
        return $val / 100;
    }
}
