<?php

namespace Folleah\Currency;

final class ApiConnection
{
    protected $apiService;

    /**
     * Create a new API connection
     * @param String $serviceName
     * @param Array $params
     */
    public function __construct($serviceName, $params)
    {
        if(is_dir(__DIR__."/ApiServices/".$serviceName))
        {
            $service = __NAMESPACE__."\ApiServices\\{$serviceName}\\ApiService";
            $this->apiService = new $service($params);
        }
        else 
        {
            throw new \Exception("{$servicename} API service directory not exist!");
        }
    }

    /**
     * Calling methods in API Service
     */
    public function __call($method, $params)
    {
        if($method != '__construct')
        {
            if(in_array($method, get_class_methods(get_class($this->apiService))))
            {
                return call_user_func_array([$this->apiService, $method], $params);
            }
            else
            {
                throw new \Exception("{$method} is undefined method");
            }
        }
    }

}
