# Currency converter

## Install

Via Composer

``` bash
$ composer require folleah/currency
```

## Usage

``` php
<?php
    use \Folleah\Currency\Converter;
    use \Folleah\Currency\ApiServices\OpenExchangeService;

    $app_id = '86c1eb0cf61a40b7a8710343d721dcdf';

    $converter = new Converter(new OpenExchangeService(['app_id' => $app_id]));

    if($converter->isCurrencyAvailable('RUB') && $converter->isCurrencyAvailable('EUR'))
    {
        echo $converter->convert('RUB', 50, 'EUR'); 
    }
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
