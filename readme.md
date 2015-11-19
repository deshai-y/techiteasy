#Tech'IT easy

##Server Requirements

* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* MySQL

##Installation

Clone the repository
```
git clone git@bitbucket.org:PNEXTIA/techiteasy.git
```

Run `composer install` to setup all vendors

##Configuration

Check if `config/app.php` and `config/database.php` already exists

If not, create them from the `.dist` files
```
cp config/app.php.dist config/app.php
cp config/database.php.dist config/database.php
```

#####Configure App

Set the application debug mode to true in `app.php`

And set your local project base url too
```
#!php
<?php
return [
	...
	'debug' => env('APP_DEBUG', true),
	...
	'url' => 'http://localhost',
	...
]
```

#####Configure Database

Create your local database
```
#!sql
mysql> CREATE DATABASE `techiteasy`;
```

Set mysql parameters in `database.php` with your localhost database informations
```
#!php
<?php
'mysql' => [
    'driver'    => 'mysql',
    'host'      => env('DB_HOST', 'techiteasy'),
    'database'  => env('DB_DATABASE', 'root'),
    'username'  => env('DB_USERNAME', 'mySup3rP455w0rd'),
    'password'  => env('DB_PASSWORD', ''),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'strict'    => false,
],
```

Then run the database migration with the command `php artisan migrate`

Last step run the seed of the database with `php artisan db:seed`

##Informations

###Good practices

This is **VERY IMPORTANT**, please read this before start to work on the project : 

* <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md" target="_blank">PSR-0 - Autoloading standard</a>
* <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md" target="_blank">PSR-1 - Basic coding standard</a>
* <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md" target="_blank">PSR-2 - Coding style guide</a>
* <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md" target="_blank">PSR-4 - Autoloader</a>

**TL;DR ???** Just take a look at **PSR-1** and **PSR-2**... 

###Default backoffice admin access

login : `admin`

password : `toor`

##About Laravel

### Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

#### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
