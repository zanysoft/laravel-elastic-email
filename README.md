# Laravel Elastic Email #

A Laravel wrapper for Elastic Email

### Installation ###

Add Laravel Elastic Email as a dependency using the composer CLI:

```bash
composer require zanysoft/laravel-elastic-email
```

Next, add the following to your config/services.php and add the correct values to your .env file
```php
'elastic_email' => [
	'key' => env('ELASTIC_KEY'),
	'account' => env('ELASTIC_ACCOUNT')
]
```

Next, in config/app.php, comment out Laravel's default MailServiceProvider. If using < Laravel 5.5, add the MailServiceProvider and ApiServiceProvider to the providers array
```php
'providers' => [
    /*
     * Laravel Framework Service Providers...
     */
    ...
//    Illuminate\Mail\MailServiceProvider::class,
    ZanySoft\ElasticEmail\MailServiceProvider::class,
    ZanySoft\ElasticEmail\ApiServiceProvider::class,
    ...
],
```

Next, in config/app.php, add the ElasticEmail to the aliases array
```php
'aliases' => [
    ...
    'ElasticEmail' => ZanySoft\ElasticEmail\Facades\ElasticEmail::class,
    ...
],
```

Finally switch your default mail provider to elastic email in your .env file by setting MAIL_DRIVER=elastic_email

### MailService Usage ###

This package works exactly like Laravel's native mailers. Refer to Laravel's Mail documentation.

### Api Usage ###
For documentation visit https://api.elasticemail.com/public/help
```php

    //For contact
    ElasticEmail::Contact()

    //For emails
    ElasticEmail::Email()

```
