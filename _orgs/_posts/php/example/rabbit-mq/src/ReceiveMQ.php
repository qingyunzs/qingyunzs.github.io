<?php

namespace rabbitMQ;

require_once "BaseMQ.php";

/**
 * Class ReceiveMQ
 * @package rabbitMQ
 */
abstract class ReceiveMQ extends BaseMQ
{
    /**
     * @var string queue
     */
    public $queue;

    /**
     * @var string Exchange
     */
    private $_exchange;

    /**
     * @var string Exchange type
     */
    private $_exchange_type;

    /**
     * @var array Routing
     */
    private $_routes;

    /**
     * @var bool Block status
     */
    private $_blocking = true;

    /**
     * @var bool QoS
     */
    private $_qos = true;

    /**
     * @var bool ACK status
     */
    private $_ack = false;

    /**
     * @var int QoS count
     */
    private $_qos_count = 1;

    /**
     * Set queue
     * @param mixed $queue
     * @return ReceiveMQ
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * Set exchange
     * @param mixed $exchange
     * @return ReceiveMQ
     */
    public function setExchange($exchange)
    {
        $this->_exchange = $exchange;
        return $this;
    }

    /**
     * Set routes
     * @param $routes
     * @return ReceiveMQ
     */
    public function setRoutes($routes)
    {
        $this->_routes = $routes;
        return $this;
    }

    /**
     * Set exchange type
     * @param mixed $exchangeType
     * @return ReceiveMQ
     */
    public function setExchangeType($exchangeType)
    {
        $this->_exchange_type = $exchangeType;
        return $this;
    }

    /**
     * Set the consumer client to process only n queues at a time.
     * @param $count
     */
    public function setQosCount($count)
    {
        $this->_qos_count = $count;
    }

    /**
     * Disable ACK
     */
    public function disableAck()
    {
        $this->_ack = true;
    }

    /**
     * Disable qos
     */
    public function disableQos()
    {
        $this->_qos = false;
    }

    /**
     * Disable blocking
     */
    public function disableBlocking()
    {
        $this->_blocking = false;
    }

    /**
     * Declare exchange
     */
    public function declareExchange()
    {
        $this->channel->exchange_declare($this->_exchange, $this->_exchange_type, false, true, false);
    }

    /**
     * Declare queue
     */
    public function declareQueue()
    {
        $this->channel->queue_declare($this->queue, false, true, false, false);
    }

    /**
     * Bind route
     */
    public function bind()
    {
        // Bind all route
        foreach ($this->_routes as $route) {
            $this->channel->queue_bind($this->queue, $this->_exchange, $route);
        }
    }

    /**
     * Receive message(default consume method)
     * @param $routeKey
     * @param $routeCategory
     * @param $message
     * @throws \Exception
     */
    public function receive()
    {
//        if ($this->qos) {
//            $this->channel->basic_qos(null, $this->qosCount, null);
//        }

        // @Method $this->call()
        $this->channel->basic_consume(
            $this->queue,
            '',
            false,
            $this->_ack,
            false,
            false,
            [$this, 'call']
        );

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
            if (!$this->_blocking) {
                $this->channel->close();
            }
        }

        // Close channel and connection
        $this->close();
    }

    /**
     * Callback
     * @param $event
     */
    public function call($event)
    {
        echo ' [x] ', $event->delivery_info['routing_key'], ':', $event->body, "\n";
        $msg = $event->body;
        $this->channel = $event->delivery_info['channel'];
        // @method \ReceiveMQ\RunReceive.php::run()
        if ($this->run($msg)) {
            $this->channel->basic_ack($event->delivery_info['delivery_tag']);
        }
    }

    /**
     * Business handle
     * @param $message
     * @return mixed
     */
    abstract public function run($message);

    /**
     * Close channel
     * @return bool
     */
    public function closeChannel()
    {
        try {
            $this->channel->close();
            $this->channel = null;
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * Destruct function
     */
    public function __destruct()
    {
        if ($this->channel !== null){
            $this->closeChannel();
        }
    }
}