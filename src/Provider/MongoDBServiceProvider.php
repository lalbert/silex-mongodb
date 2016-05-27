<?php

namespace Lalbert\Silex\Provider;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use MongoDB\Client;

class MongoDBServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['mongodb.config'] = [
            'server' => 'mongodb://localhost:27017',
            'uriOptions' => [],
            'driverOptions' => [],
        ];

        $app['mongodb'] = function ($app) {
            $client = new Client(
                $app['mongodb.config']['server'],
                $app['mongodb.config']['uriOptions'],
                $app['mongodb.config']['driverOptions']
            );

            return $client;
        };
    }
}
