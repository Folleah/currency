# Currency converter

## Install

Via Composer

``` bash
$ composer require folleah/currency
```

## Usage

``` php
<?php
Use Folleah\Currency\ApiConnection;
Use Folleah\Currency\Converter;

$appKey = 'YOUR_OPENEXCHANGE_APP_KEY';

$connection = new ApiConnection('OpenExchange', ['app_id' => $appKey]);

$converter = new Converter($connection);

echo $converter->from('USD')->value(1)->convertTo('RUB');
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
