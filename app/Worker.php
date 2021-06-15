<?php

namespace App;

use Exception;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;
use QuetzalStudio\PhpAmqpWorker\Log\Logger;
use QuetzalStudio\PhpAmqpWorker\Worker as AMQPWorker;

class Worker extends AMQPWorker
{
    use HasDatabase;

    protected $messageHandler;

    public function __construct($basePath = null)
    {
        parent::__construct($basePath);

        $this->messageHandler = new MessageHandler($this);
    }

    /**
     * Get worker name
     *
     * @return string
     */
    public function name(): string
    {
        return env('APP_NAME', 'php_worker');
    }

    /**
     * Process incoming message
     *
     * @param AMQPMessage $message
     * @return void
     */
    public function handle(AMQPMessage $message): void
    {
        $this->messageHandler->process($message);
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
        $this->messageHandler->onFail($message, $e);
    }
}
