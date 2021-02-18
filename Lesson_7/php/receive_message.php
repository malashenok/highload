<?php

require_once '../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$queues_keys = [ 
    'payments' => '*.payment', 
    'delivery' => '*.delivery', 
    'comments' => '*.comment'];

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->exchange_declare('topic_ex', 'topic', false, false, false);

$callback = function ($msg) {
    echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
};

foreach($queues_keys as $queue_name => $binding_key) {
  $channel->queue_declare($queue_name, false, false, true, false);
  $channel->queue_bind($queue_name, 'topic_ex', $binding_key);
  $channel->basic_consume($queue_name, '', false, true, false, false, $callback);

}

echo " [*] Waiting for messages. To exit press CTRL+C\n";




while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();