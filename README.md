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
use \Folleah\Currency\ApiServices\OpenExchange\ApiService;

$appKey = 'YOUR_OPENEXCHANGE_APP_KEY';

$converter = new Converter(new ApiService(['app_id' => $appKey]));

echo $converter->convert('USD', 1, 'RUB');
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
