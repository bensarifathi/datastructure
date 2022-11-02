<?php

namespace App;

use App\LinkedList;
use Exception;

include 'App/LinkedList.php';


class Stack {
    private ?LinkedList $container;

    public function __construct()
    {
        $this->container = new LinkedList();
    }

    public function push(int $value) : Stack
    {
        $this->container->addLast($value);
        return $this;
    }

    public function pop() : int
    {
        try {
            return $this->container->removeLast();
        } catch (\Throwable $th) {
            throw new Exception("Can't pop element from an empty Stack");
        }
    }

    public function isEmpty() : bool
    {
        return $this->container->isEmpty();
    }

    public function getSize() : int
    {
        return $this->container->getSize();
    }

    public function peek() : int
    {
        $node = $this->container->getTail();
        if($node == null)
            throw new Exception("Can't get peek of an empty stack");
        return $node->value;
    }
}