<?php

use App\Entry;
use App\EntryLinkedList;

include 'App/entryLinkedList.php';


class HashMap {
    private array $items;
    private int $maxSize = 100;

    public function __construct()
    {
        $this->items = array_fill(0, $this->maxSize, null);
    }

    public function put(int $key, string $value)
    {
        $index = $key % $this->maxSize;
        $entry = new Entry($key, $value);
        if ($this->isEmpty($index))
        {
            $ll = new EntryLinkedList();
            $ll->addFirst($entry);
            $this->items[$index] = $ll;
        }
        else
        {
            $ll = $this->items[$index];
            $this->updateNode($ll, $entry);
        }
    }

    private function isEmpty(int $index)
    {
        return $this->items[$index] == null;
    }

    private function updateNode(EntryLinkedList $ll, Entry $entry)
    {

        $current = $ll->getHead();
        var_dump($current->value);
        $current->next->value = $entry;
        var_dump($current->next->value, $current->value);
        die();
        while($current != null)
        {
            if($current->value->key == $entry->key)
            {
                $current->value = $entry;
                return;
            }
            else
                $current = $current->next;
        }
        $tail = $ll->getTail();
        $tail->next = $entry;
    }
}

