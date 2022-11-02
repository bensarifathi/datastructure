<?php

use App\Queue1;

include 'App/queue1.php';


$queue = new Queue1();

$queue->enqueue(15)->enqueue(20)->enqueue(3);
$first = $queue->dequeue();
var_dump($queue, $first, $queue->peek());