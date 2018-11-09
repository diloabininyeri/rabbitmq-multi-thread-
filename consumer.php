<?php

include 'Rabbit.php';
$queue = 'test_kuyruk';

$rabbit = new Rabbit($queue);
$rabbit->receive($queue);
