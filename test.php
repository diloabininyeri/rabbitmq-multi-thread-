<?php

include 'Rabbit.php';
$queue = 'test_kuyruk';

$rabbit = new Rabbit($queue);

die(print_r($rabbit->status));
list($queueName, $messageCount, $consumerCount) = $rabbit->status;

echo 'KUYRUK ADI : ' . $queueName . PHP_EOL;
echo 'KUYRUKTAK� ��LEM SAYISI : ' . $messageCount . PHP_EOL;
echo 'D�NLEYEN SAYISI : ' . $consumerCount . PHP_EOL;
