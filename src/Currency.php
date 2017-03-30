<?php

namespace Folleah\Currency;

class Currency
{
    protected $currency;

    /**
     * Create a new Currency
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param string $currency contains a string for converting
     *
     * @return current Currency object
     */
    public function convertTo($currency, $value)
    {
        return OpenExchange\OpenExchangeService::test();
    }
}
