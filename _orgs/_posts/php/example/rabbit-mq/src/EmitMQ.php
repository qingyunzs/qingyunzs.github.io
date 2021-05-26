<?php

namespace rabbitMQ;

require_once "BaseMQ.php";

abstract class EmitMQ extends BaseMQ
{
    protected $exchange;
    protected $exchangeType;
    protected $bindKey;
    protected $queue;

    /**
     * @param mixed $exchange
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * @param mixed $exchangeType
     */
    public function setExchangeType($exchangeType)
    {
        $this->exchangeType = $exchangeType;
        return $this;
    }

    /**
     * @param mixed $bindKey
     */
    public function setBindKey($bindKey)
    {
        $this->bindKey = $bindKey;
        return $this;
    }

    // Declare exchange
    public function declareExchange()
    {
        $this->channel->exchange_declare($this->exchange, $this->exchangeType, false, true, false);
    }

    abstract public function publish($message);
}