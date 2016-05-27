<?php

namespace Lalbert\Silex\Tests;

use Silex\Application;
use Lalbert\Silex\Provider\MongoDBServiceProvider;

class MongoDBServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testServiceDefault()
    {
        $app = new Application();
        $app->register(new MongoDBServiceProvider());

        $this->assertInstanceOf('\MongoDB\Client', $app['mongodb']);

        $uri = $app['mongodb']->__toString();
        $this->assertEquals('mongodb://localhost:27017', $uri);
    }

    public function testConfigService()
    {
        $app = new Application();
        $app->register(new MongoDBServiceProvider(), [
            'mongodb.config' => [
                'server' => 'mongodb://localhost:27018',
            ],
        ]);

        $this->assertInstanceOf('\MongoDB\Client', $app['mongodb']);

        $uri = $app['mongodb']->__toString();
        $this->assertEquals('mongodb://localhost:27018', $uri);
    }

    public function testConfigAppService()
    {
        $app = new Application([
            'mongodb.config' => [
                'server' => 'mongodb://localhost:27018',
            ],
        ]);

        $app->register(new MongoDBServiceProvider());

        $this->assertInstanceOf('\MongoDB\Client', $app['mongodb']);

        $uri = $app['mongodb']->__toString();
        $this->assertEquals('mongodb://localhost:27018', $uri);
    }
}
