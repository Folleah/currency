<?php

namespace Folleah\Currency\ApiServices\OpenExchange;

class ApiAdapter implements \Folleah\Currency\ApiServices\AdapterInterface  
{
    protected $params;
    private $apiService;

    public function __construct($params)
    {
        $this->params = $params;
        $this->apiService = new ApiService();
    }

    public function getAvailableCurrencies()
    {
        return 'test';
    }

    public function getCurrencyValue($val)
    {
        return 'test';
    }

    public function getAllCurrencies()
    {
        return $this->apiService->getAllCurrencies($this->params);
    }
}
