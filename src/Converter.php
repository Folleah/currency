<?php

namespace Folleah\Currency;

use Folleah\Currency\ConverterLogic;

class Converter
{
    private $connection;
    private $currentCurrency;
    private $currentValue;

    /**
     * Create a new converter
     * @param ApiConnection $connection
     * @param String $currency - current currency
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

    public function from($currency)
    {
        if($this->connection->isCurrencyAvailable($currency))
        {
            $this->currentCurrency = $currency;
            return $this;
        }
    }

    public function value($value)
    {
        $this->currentValue = $value;
        return $this;
    }

    public function convertTo($currency)
    {
        $allCurrencies = $this->connection->getAllCurrencies();

        $val = ConverterLogic::convert(
            $allCurrencies[$this->currentCurrency],
            $allCurrencies[$currency],
            $this->currentValue
        );
        return $val;
    }
}
