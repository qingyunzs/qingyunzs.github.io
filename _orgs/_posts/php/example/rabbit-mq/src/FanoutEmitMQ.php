<?php

namespace rabbitMQ;

use PhpAmqpLib\Message\AMQPMessage;

class FanoutEmitMQ extends EmitMQ
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Publish message
     * @param $message
     */
    public function publish($message)
    {
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, $this->exchange);
    }
}