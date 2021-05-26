<?php
namespace rabbitMQ;

require_once "vendor/autoload.php";
require_once "src/DirectEmitMQ.php";

/**
 * Class Publisher
 * @package rabbitMQ
 */
class Publisher{
    public function test()
    {
        $config = require 'config.php';
        $exchange = $config['exchange_user'];
        $exchangeType = 'direct';
        $routeKey = 'order';
        $msg = '用户抢购到了一部 iphone 手机';

        try {
            $emit_direct = new DirectEmitMQ();
            $emit_direct->setExchange($exchange)->setExchangeType($exchangeType)->declareExchange();
            $emit_direct->setBindKey($routeKey)->publish($msg);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

$publisher = new Publisher();
$publisher->test();
