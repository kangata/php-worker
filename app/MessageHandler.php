<?php

namespace App;

use Exception;
use PhpAmqpLib\Message\AMQPMessage;

class MessageHandler
{
    protected $worker;

    public function __construct($worker)
    {
        $this->worker = $worker;
    }

    public function log()
    {
        return $this->worker->log();
    }

    /**
     * Process incoming message
     *
     * @param AMQPMessage $message
     * @return void
     */
    public function process(AMQPMessage $message): void
    {
        $message->ack();
    }

    /**
     * Handle if process fail
     *
     * @param AMQPMessage $message
     * @param Exception $e
     * @return void
     */
    public function onFail(AMQPMessage $message, Exception $e): void
    {
        //
    }
}
