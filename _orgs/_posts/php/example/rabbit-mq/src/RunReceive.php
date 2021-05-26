<?php

namespace rabbitMQ;

require_once "ReceiveMQ.php";

/**
 * 消费者类（Class RunReceive）
 * @package rabbitMQ
 */
class RunReceive extends ReceiveMQ
{
    public function run($message)
    {
        // region TODO handle business logic.
        var_dump($message);
        // endregion

        // 消费一次完后就不在消费
//        $this->disableBlocking();
        return true;
    }
}