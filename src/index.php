<?php
phpinfo ();

require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

try {
    // соединяемся с RabbitMQ
    $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

    // Создаем канал общения с очередью
    $channel = $connection->channel();
    $channel->queue_declare('Coffee', false, true, false, false);

    // создаем сообщение
    $msg = new AMQPMessage($_POST['type']);
    // размещаем сообщение в очереди
    $channel->basic_publish($msg, '', 'Coffee');

    // закрываем соединения
    $channel->close();
    $connection->close();
}
catch (AMQPProtocolChannelException $e){
    echo $e->getMessage();
}
catch (AMQPException $e){
    echo $e->getMessage();
}
