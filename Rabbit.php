<?php

require_once 'vendor/autoload.php';

class Rabbit {

    private $host = 'localhost';
    private $port = 5672;
    private $user = 'guest';
    private $password = 'guest';
    private $connection;
    private $channel;
    public $status;

    public function __construct($queueName) {

        $this->connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
                $this->host, $this->port, $this->user, $this->password
        );

        $this->channel = $this->connection->channel();
        $this->status = $this->channel->queue_declare(
                $queueName, false, true, false, false
        );
    }

    public function receive($queueName) {

        $callback = function($msg) {
            echo "Çalýþan Ýþlem : " . json_encode($msg->body) . PHP_EOL;
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume($queueName, '', false, false, false, false, $callback);

        echo "Bekleniyor...".PHP_EOL;
        while (count($this->channel->callbacks)) {
            $this->channel->wait();
            sleep(1);
        }
    }

    public function addToQuene($msgStr, $queueName) {

        $msg = new \PhpAmqpLib\Message\AMQPMessage($msgStr);
        $this->channel->basic_publish($msg, '', $queueName);
    }

    function __destruct() {
        $this->channel->close();
        $this->connection->close();
    }

}
