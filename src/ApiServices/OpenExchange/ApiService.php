<?php

namespace Folleah\Currency\ApiServices\OpenExchange;

class ApiService extends \Folleah\Currency\ApiServices\ApiServiceBuilder
{
    public function getAllCurrencies($params)
    {
        $url = "https://openexchangerates.org/api/latest.json";

		return parent::httpQuery($url, $params);
    }
}
