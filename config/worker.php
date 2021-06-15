<?php

return [
    'host' => env('WORKER_HOST', '127.0.0.1'),
    'port' => env('WORKER_PORT', 5672),
    'user' => env('WORKER_USER', 'guest'),
    'password' => env('WORKER_PASSWORD', 'guest'),
    'vhost' => env('WORKER_VHOST', '/'),
    'exchange' => env('WORKER_EXCHANGE', 'amq.direct'),
    'queue' => env('WORKER_QUEUE', 'worker.queue'),
    'routing_key' => env('WORKER_ROUTING_KEY', 'worker.key'),
    'no_ack' => env('WORKER_NO_ACK', false),
];
