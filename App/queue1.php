<?php

namespace App;
use App\Stack;
use Exception;

include 'App/stack.php';

class Queue1 {
    private Stack $s1;
    private Stack $s2;

    public function __construct()
    {
        $this->s1 = new Stack();
        $this->s2 = new Stack();
    }

    public function enqueue(int $value) : Queue1
    {
        $this->s1->push($value);
        return $this;
    }

    public function dequeue() : int
    {
        if ($this->s2->isEmpty() && $this->s1->isEmpty())
            throw new Exception("Can't dequeue an element from an empty queue");
        else
        {
            while (!$this->s1->isEmpty())
                $this->s2->push($this->s1->pop());
        }
        return $this->s2->pop();

    }

    public function isEmpty() : bool
    {
        return $this->s1->isEmpty() && $this->s2->isEmpty();
    }

    public function peek() : int
    {
        if ($this->s2->isEmpty() && $this->s1->isEmpty())
            throw new Exception("Can't get peek of an empty queue");
        else 
        {
            while (!$this->s1->isEmpty())
                $this->s2->push($this->s1->pop());
        }
        return $this->s2->peek();
    }
}