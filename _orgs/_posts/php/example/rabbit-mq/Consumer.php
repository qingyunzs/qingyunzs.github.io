<?php

namespace rabbitmq;

require_once "vendor/autoload.php";
require_once "src/RunReceive.php";

/**
 * Class Customer
 * @package rabbitmq
 */
class Consumer
{
    /**
     * Test
     * @throws \Exception
     */
    public function test()
    {
        global $argv;
        $route_module = $argv[1];

        $config = require 'config.php';
        // 1.  "Hello World!"

        // 2. Work queues

        // 3. Publish/Subscribe

        $routes = $config['routes'];
        $exchange = $config['exchange_' . $route_module];
        $queue = $config['queue'][$route_module . '_receive'];
        $route = $routes[$route_module];

        // 4. Routing
        try {
            $receive = new RunReceive();
            $receive->setExchange($exchange)->setExchangeType('direct')->declareExchange();
            $receive->setQueue($queue)->declareQueue();
            $receive->setRoutes($route)->bind();
            $receive->receive();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        // 5. Topics

        // 6. RPC
    }
}

$consumer = new Consumer();
$consumer->test();
