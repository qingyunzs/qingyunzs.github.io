<?php

namespace rabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class BaseMQ
 * @package rabbitMQ
 */
abstract class BaseMQ
{
    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;

    /**
     * @var AMQPStreamConnection
     */
    private static $_connection;

    /**
     * @var int Last connection time
     */
    private static $_lastConnectTime;

    /**
     * Construct function
     * @throws \AMQPConnectionException
     */
    public function __construct()
    {
        if (!(self::$_connection instanceof AMQPStreamConnection)) {
            // connect
            self::connect();
        }
        $this->channel = self::$_connection->channel();
    }

    /**
     * Connect
     */
    private static function connect()
    {
        // get config params
        $config = require __DIR__ . '/../config.php';
        $host = $config['host'];
        $port = $config['port'];
        $user = $config['user'];
        $password = $config['password'];
        $vhost = $config['vhost'];

        self::$_connection = new AMQPStreamConnection($host, $port, $user, $password, $vhost);
        self::$_lastConnectTime = time();
    }

    /**
     * Close  connection
     * @throws \Exception
     */
    protected function close()
    {
        $this->channel->close();
        self::$_connection->close();
    }
}