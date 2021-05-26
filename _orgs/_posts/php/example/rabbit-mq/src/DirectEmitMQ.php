<?php

namespace rabbitMQ;

require_once "EmitMQ.php";

use PhpAmqpLib\Message\AMQPMessage;

class DirectEmitMQ extends EmitMQ
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
        $this->channel->basic_publish($msg, $this->exchange, $this->bindKey);
    }
}