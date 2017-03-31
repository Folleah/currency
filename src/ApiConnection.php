<?php

namespace Folleah\Currency;

class ApiConnection
{
	protected $apiAdapter;

    /**
     * Create a new API connection
     * @param $serviceName string
     * @param $params array
     */
    public function __construct($serviceName, $params)
    {
        if(is_dir(__DIR__."/ApiServices/".$serviceName))
        {
        	$adapter = __NAMESPACE__."\ApiServices\\{$serviceName}\\ApiAdapter";
        	$this->apiAdapter = new $adapter($params);
        } 
        else 
        {
        	throw new \Exception("{$servicename} API service directory not exist!");
        }
    }

    /**
     * Getting available currencies in API
     */
    public function getAllCurrencies()
    {
    	return $this->apiAdapter->getAllCurrencies();
    }
}
