<?php

namespace Folleah\Currency\ApiServices;

use \GuzzleHttp;
use Folleah\Currency\ApiServices\ApiServiceInterface;

class OpenExchangeService implements ApiServiceInterface
{
   
    private $currencies = [];

    public function __construct($params)
    {
        $client = new GuzzleHttp\Client();

        $res = $client->request('GET', 'https://openexchangerates.org/api/latest.json', [
            'query' => $params
        ]);
        
        $this->currencies = json_decode($res->getBody(), true);
    }

    public function getAllCurrencies()
    {
        return $this->currencies['rates'];
    }

    public function getAvailableCurrencies()
    {
        return array_keys($this->currencies['rates']);
    }

    public function isCurrencyAvailable($currency)
    {
        if(in_array($currency, array_keys($this->currencies['rates'])))
        {
            return true;
        }

        return false;
    }
}
