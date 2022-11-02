<?php

namespace App;

use Exception;

include 'App/LinkedList.php';

class Queue {
    private ?LinkedList $container;

    public function __construct()
    {
        $this->container = new LinkedList();
    }

    public function enqueue(int $value) : Queue
    {
        $this->container->addLast($value);
        return $this;
    }

    public function dequeue() : int
    {
        try {
            return $this->container->removeFirst();
        } catch (\Throwable $th) {
            throw new Exception("Can't dequeue an element from an empty queue");
        }
        
    }

    public function isEmpty() : bool
    {
        return $this->container->isEmpty();
    }

    public function peek() : int
    {
        $node = $this->container->getHead();
        if($node == null)
            throw new Exception("Can't get peek of an empty queue");
        return $node->value;
    }
}