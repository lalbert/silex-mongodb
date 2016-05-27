# silex-mongodb
Simple mongodb service provider for Silex 2.x and official mongodb driver

## Features

This library provides easy access to a MongoDB database using the extension ([mongodb](http://php.net/manual/en/set.mongodb.php), **not [mongo](http://php.net/manual/en/book.mongo.php)**) and the official [MongoDB PHP driver](https://github.com/mongodb/mongo-php-library).

## Requirements

* PHP 5.4+
* [mongodb official PECL extension](https://secure.php.net/mongodb)

## Installation

The best way to install the component is using [Composer](https://getcomposer.org/)

    $ composer require lalbert/silex-mongodb

## Usage

### Register service

``` {.php}
$app->register(new MongoDBServiceProvider());
```

You can also pass configuration settings :

_See http://php.net/manual/en/mongodb-driver-manager.construct.php for options allowed._

``` {.php}
$app->register(new MongoDBServiceProvider(), [
    'mongodb.config' => [
        'server' => 'mongodb://localhost:27017',
        'options' => [],
        'driverOptions' => [],
    ]
]);
```

Your application :

``` {.php}
$document = ['key' => 'value'];

$app['mongodb']
  ->mydatabase
  ->mycollection
  ->insert($document)
;
```

_See official [MongoDB PHP Library documentation](http://mongodb.github.io/mongo-php-library/)_
