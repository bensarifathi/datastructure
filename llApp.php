<?php

include 'App/LinkedList.php';

use App\LinkedList;

$ll = new LinkedList();
$ll->addFirst(15)->addFirst(10)->addLast(3);
var_dump($ll);