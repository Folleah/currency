<?php

namespace Folleah\Currency\ApiServices\OpenExchange;

class ApiService extends \Folleah\Currency\ApiServices\ApiServiceDecorator
{
	private $baseCurrency;
	private $currencies = [];
	private $params;

	public function __construct($params)
	{
		$url = "https://openexchangerates.org/api/latest.json";
		$query = parent::httpQuery($url, $params);

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

		return parent::httpQuery($url, $this->params)['rates'];
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
