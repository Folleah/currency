<?php

namespace Folleah\Currency\ApiServices;

abstract class ApiServiceDecorator
{
    /**
     * @return Array - return available currencies array in ISO 4217 format
     */
    public abstract function getAvailableCurrencies();

    /**
     * @return Array - return currencies 
     */
    public abstract function getAllCurrencies();

    /**
     * @param String $currency - currency code in ISO 4217 format
     * @return Boolean true | false
     */
    public abstract function isCurrencyAvailable($currency);

    /**
     * Make http query by cURL
     * @param String $url - URI
     * @param Array $params - http params
     * @return Array - query result
     */
    protected function httpQuery($url, $params)
    {
        $body = http_build_query($params);
        $url = $url."?".$body;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }
}
