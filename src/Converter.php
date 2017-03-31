<?php

namespace Folleah\Currency;

use Folleah\Currency\ConverterLogic;
use Folleah\Currency\ApiServices\ApiServiceInterface;

class Converter
{
    private $connection;

    /**
     * Create a new converter
     * @param ApiConnection $connection
     * @param String $currency - current currency
     */
    public function __construct(ApiServiceInterface $connection)
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
    public function setConnection(ApiServiceInterface $connection)
    {
        $this->connection = $connection;
    }

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
