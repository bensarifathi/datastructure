<?php

use App\Queue;

include 'App/queue.php';


$queue = new Queue();
$queue->enqueue(15)->enqueue(10)->enqueue(3);
$queue->dequeue();
var_dump($queue, $queue->peek());