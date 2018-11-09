<?php

include 'Rabbit.php';
$queue = 'test_kuyruk';

$msgStr = 'Yeni islem - ' . rand(0, 100);

$rabbit = new Rabbit($queue);
$rabbit->addToQuene($msgStr, $queue);