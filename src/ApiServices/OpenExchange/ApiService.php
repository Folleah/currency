<?php

namespace Folleah\Currency\ApiServices\OpenExchange;

use Folleah\Currency\ApiServices\ApiQueryBuilder;
use Folleah\Currency\ApiServices\ApiServiceInterface;

class ApiService implements ApiServiceInterface
{
    private $baseCurrency;
    private $currencies = [];
    private $params;

    public function __construct($params)
    {
        $url = "https://openexchangerates.org/api/latest.json";
        $query = ApiQueryBuilder::httpQueryJSON($url, $params);

        $this->params = $params;
        $this->baseCurrency = $query['base'];
        $this->currencies = array_keys($query['rates']);
    }

    private function setBaseCurrency($currency)
    {
        if(isCurrencyAvailable($currency))
        {
            $this->baseCurrency = $currency;
        }
    }

    public function getAllCurrencies()
    {
        $url = "https://openexchangerates.org/api/latest.json";

        return ApiQueryBuilder::httpQueryJSON($url, $this->params)['rates'];
    }

    public function getAvailableCurrencies()
    {
        return $this->currencies;
    }

    public function isCurrencyAvailable($currency)
    {
        if(in_array($currency, $this->currencies))
        {
            return true;
        }

        return false;
    }
}
