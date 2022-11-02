<?php

namespace App;

use Exception;

class Entry {
    public int $key;
    public string $value;

    public function __construct(int $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}


class Node {
    public Entry $value;
    public ?Node $next = null;
    public ?Node $prev = null;

    public function __construct(Entry $value)
    {   
        $this->value = $value;
    }
}

class EntryLinkedList {
    private ?Node $head = null;
    private ?Node $tail = null;
    private int $size = 0;

    public function addFirst(Entry $value) : EntryLinkedList {
        $node = new Node($value);
        if ($this->head == null)
            $this->head = $this->tail = $node;
        $node->next = $this->head;
        $this->head->prev = $node;
        $this->head = $node;

        $this->size++;
        return $this;
    }

    public function addLast(Entry $value) : EntryLinkedList
    {
        $node = new Node($value);
        if ($this->head == null)
            $this->head = $this->tail = $node;
        $this->tail->next = $node;
        $node->prev = $this->tail;
        $this->tail = $node;

        $this->size++;
        return $this;
    }

    public function removeFirst() : Entry
    {
        $out =null;
        if($this->head == null)
            throw new Exception("Can't remove element on an empty list.");
        elseif ($this->head == $this->tail)
        {
            $out = $this->head->value;
            $this->head = $this->tail = null;
        }
            
        else
        {
            $out = $this->head->value;
            $second = $this->head->next;
            $second->prev = null;

            $this->head->next = null;
            $this->head = $second;
        }

        $this->size--;
        return $out;
    }

    public function removeLast() : Entry
    {
        $out =null;
        if($this->head == null)
            throw new Exception("Can't remove element on an empty list.");
        elseif ($this->head == $this->tail)
        {
            $out = $this->tail->value;
            $this->head = $this->tail = null;
        }
            
        else
        {
            $out = $this->tail->value;
            $prev = $this->tail->prev;
            $prev->next = null;

            $this->tail->prev = null;
            $this->tail = $prev;
        }
        $this->size--;
        return $out;
    }

    public function indexOf(int $value) : int
    {
        $current = $this->head;
        $index = 0;
        while($current != null)
        {
            if($current->value->key == $value) 
                return $index;
            $index++;
            $current = $current->next;
        }
        return -1;
    }

    public function contains(int $value) : bool
    {
        return $this->indexOf($value) != -1; 
    }

    public function isEmpty() : bool
    {
        return $this->head == null;
    }

    public function getSize() : int
    {
        return $this->size;
    }

    public function getTail() : ?Node
    {
        return $this->tail;
    }

    public function getHead() : ?Node
    {
        return $this->head;
    }

    public function updateAtIndex(int $index, Entry $value)
    {
        $i = 0;
        $current = $this->head;
        while ($i != $index)
        {
            $current = $current->next;
            $i++;
        }
        $current->value = $value;
    }
}