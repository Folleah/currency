<?php

namespace Folleah\Currency\ApiServices;

interface ApiServiceInterface
{
    /**
     * @return Array - return available currencies array in ISO 4217 format
     */
    public function getAvailableCurrencies();

    /**
     * @return Array - return currencies 
     */
    public function getAllCurrencies();

    /**
     * @param String $currency - currency code in ISO 4217 format
     * @return Boolean true | false
     */
    public function isCurrencyAvailable($currency);
}