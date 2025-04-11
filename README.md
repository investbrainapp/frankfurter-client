# Frankfurter API wrapper for Laravel

This is a simple wrapper for the fantastic Frankfurter API. 

### Installation

Use composer to install:

```bash
composer require investbrainapp/frankfurter-client
```

### Usage 

This package provides a simple Laravel facade that exposes all functionality provided by the Frankfurter API. 

##### Latest
 
To get the latest exchange rate use the `latest` method:

```php
return Frankfurter::latest();
```

##### Historical
 
To get a historic exchange rate, pass a well formated date string or a `DateTime` object to the `historical` method:

```php
return Frankfurter::historical('2025-01-01');
```

##### Time series
 
To get time series data for a range of dates, pass well formated date strings or `DateTime` objects to the `timeSeries` method:

```php
return Frankfurter::timeSeries('2023-01-01', '2024-12-31');
```

If you want all rates between a date in the past and today's date, you can omit the second argument to the `timeSeries` method:

```php
return Frankfurter::timeSeries('2023-01-01');
```

##### Supported currencies

You can call the `currencies` method to get a list of all supported currencies:

```php
return Frankfurter::currencies();
```

### Other methods

You can pass an array to the `setSymbols` method to limit the query to only specified symbols:

```php
Frankfurter::setSymbols(['INR','JPY','GBP'])->latest();
```

You can also set the base currency using the `setBaseCurrency` method:

```php
Frankfurter::setBaseCurrency(['GBP'])->latest();
```

### Configuration

You can publish the `frankfurter.php` config file by running:

```bash
php artisan vendor:publish --provider="Investbrain\Frankfurter\FrankfurterServiceProvider" --tag=config
```

In the config file, you can adjust your base currency and the base url (if you're self hosting Frankfurter).
