<?php

namespace Folleah\Currency\ApiServices;

interface AdapterInterface  
{
	/**
	 * @return Array - return available currencies array in ISO 4217 format
	 */
    public function getAvailableCurrencies();

    /**
     * @param String - currency type in ISO 4217 format
	 * @return String - return currency value
	 */
    public function getCurrencyValue($currency);
}
