<?php

use App\Stack;

include 'App/stack.php';


$stack = new Stack();
$stack->push(15)->push(20)->push(10);
$last = $stack->pop();
var_dump($last);
var_dump($stack->peek());