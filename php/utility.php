<?php

class ListNode
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
    public function readNode()
    {
        return $this->data;
    }
}
class LinkedList
{
    public $firstnode; //first node in list
    public $lastnode; //last node in list
    public $count; // no of nodes
    public function __construct()
    {
        $this->firstnode = null;
        $this->lastnode = null;
        $this->count = 0;
    }
    public function isEmpty()
    {
        return $this->$firstnode == null;
    }
    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstnode;
        $this->firstnode = &$link;
        if ($this->lastnode == null) // check if it is firstnode or not
        {
            $this->lastnode = &$link;
        }
        // if assign current obj adress to last node
        $this->count++; //count nodes
    }
    public function insertLast($data)
    {
        if ($this->firstnode != null) {
  // add data  and next adress values
            $link = new ListNode($data);
            $this->lastnode->next = $link;  
            $link->next = null;
            $this->lastnode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data); // check wheather 1st node is there or not
        }
    }
    public function readList()
    {
        $listData = array();
        $current = $this->firstnode;
        $i = 0;                          // read and create the array of data in linked list
        while ($current != null) {
            $listData[$i] = $current->readNode();
            $current = $current->next;
            $i++;
        }

        return $listData;
    }
    public function deleteNode($key)
    {
        $current = $this->firstnode;
        $previous = $this->firstnode;

        while ($current->data != $key) {
            if ($current->next == null) {
                return 1;          // if no element present return 1
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstnode) {
            if ($this->count == 1) {
                $this->lastnode = $this->firstnode;
            }
            $this->firstnode = $this->firstnode->next;
        } else {
            if ($this->lastnode == $current) {
                $this->lastnode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
        return 0;            //if element present return 0
    }
    public function sort()
    {
        if ($this->firstnode !== null) {
            if ($this->firstnode->next !== null) {       // using bubble sort
                for ($i = 0; $i < $this->count; $i++) {
                    $temp = null;
                    $current = $this->firstnode;
                    while ($current !== null) {
                        if ($current->next !== null && $current->data > $current->next->data) {
                            $temp = $current->data;
                            $current->data = $current->next->data;    // swapping
                            $current->next->data = $temp;
                        }
                        $current = $current->next;
                    }
                }
            }
        }
    }
    public function readListInList()
    {   // function to the data in linked list
        $current = $this->firstnode;
        while ($current != null) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
        echo "\n";
    }
    public function addToFile($filename)
    {   // function to add data into file 
        $fh = fopen($filename, 'a');
        $current = $this->firstnode;
        while ($current != null) {
            $Data = $current->readNode() . " ";
            fwrite($fh, $Data);
            $current = $current->next;
        }
        fclose($fh);
        echo "\n";
    }
    public function insertinto($dataa)
    {  // function to insert data into ordered linked list 
        $new = new ListNode($dataa);
        $current = $this->firstnode;
        while ($current != null) {
            if ($current == $this->firstnode) {
                if ($dataa <= $current->data) {
                    $new->next = $current;        //adding before firstnode
                    $this->firstnode = $new;
                    $this->count++;
                    break;
                }
            }

            if ($current == $this->lastnode) {
                if ($dataa > $current->data) {
                    $new->next = null;           //adding after lastnode
                    $current->next = $new;
                    $this->lastnode = $new;
                    $this->count++;
                    break;
                }
            }
            if ($dataa <= $current->data) {
                $new->next = $current;        //adding in btw 1st and last
                $previous->next = $new;
                $this->count++;
                break;
            }
            $previous = $current;
            $current = $current->next;
        }
    }
}
// stack implementation
class Stack
{   
    public $top;
    public $stackArray = array();
    public function __construct()
    {
        $this->top = -1;
    }
    public function push($element)
    {
        $this->top = $this->top + 1;
        $this->stackArray[$this->top] = $element;
    }
    //to check pop operation 
    public function pop()
    {
        if ($this->isEmpty()) {
            return true;
        }
        $this->top = $this->top - 1;
        return false;

    }

    public function isEmpty()
    {
        if ($this->top == -1) {

            return true;
        }
        return false;
    }
    public function size()
    {
        $size = $this->top + 1;
        echo "size of stack =" . $size . "\n";
    }

}
// queue implimentation 
class Element
{
    public $value;
    public $next;

}

class Queue
{
    private $font = null;
    private $back = null;
    private $totalammount = 20000000;
    public function isEmpty()
    {
        return $this->font == null;
    }

    public function getInt()
    {
        $num = readline();
        if (filter_var($num, FILTER_VALIDATE_INT) && (preg_match('/[0-9]/', $num))) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    public function enqueue($name)
    {
        $oldBack = $this->back;
        $this->back = new Element();
        $this->back->value = $name;
        if ($this->isEmpty()) {
            $this->font = $this->back;
        } else {
            $oldBack->next = $this->back;
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $removedValue = $this->font->value;
        echo "person name : " . $removedValue . "\n";
        echo "enter the operation 1: deposite , 2 : withdraw , 3 :check balance \n";
        $operation = $this->getInt();
        if ($operation == 1 || $operation == 2) {
            echo "enter the amount \n";
            $amount = $this->getInt();
        } else {
            $amount = 0;
        }

        $this->cash($amount, $operation);
        $this->font = $this->font->next;
    }
    public function cash($amount, $operation)
    {
        switch ($operation) {
            case 1:
                $this->totalammount = $this->totalammount + $amount;
                echo "Deposited " . $amount . " into bank \n";
                break;
            case 2:
                if ($amount <= $this->totalammount) {
                    $this->totalammount = $this->totalammount - $amount;
                    echo "Withdrawn " . $amount . " from bank \n";
                } else {
                    echo "Sorry no cash in bank ,see you next time \n";
                }

                break;
            default:
                echo "bank cash amount available is : " . $this->totalammount . "\n";
                break;
        }
    }
}
// dqueue implimentation
class Node
{
    public $value;
    public $next;
    public $prev;
    public function __construct($data)
    {
        $this->value=$data;
        $this->nect=null;
        $this->prev=null;
    }

}

class Dqueue
{
    private $font = null;
    private $back = null;
    private $size = 0;
    
    public function isEmpty()
    {
        return $this->font == null;
    }
    public function insertFirst($data)
    {
        $newobj = new Node($data);
        if($this->font == null)
        $this->back = $this->font = $newobj;
        else{
            $newobj->next=$this->font;
            $this->font->prev=$newobj;
            $this->font=$newobj;
        }
        $this->size++;
    }
    public function insertLast($data)
    {
        $newobj = new Node($data);
        if($this->back == null)
        $this->back = $this->font = $newobj;
        else{
            $newobj->back=$this->$back;
            $this->back->next=$newobj;
            $this->back=$newobj;
        }
        $this->size++;
    }
    public function deleteFront()
    {
        $temp =$this->font;
        $this->font=$this->font->next;
        if($this->font==null)
        $this->back=null;
        else
        $this->font->prev=null;
        $this->size--;
        return $temp->value;
    }
    public function deleteLast()
    {
        $temp =$this->back;
        $this->back=$this->back->prev;
        if($this->back==null)
        $this->font=null;
        else
        $this->back->next=null;
        $this->size--;
        return $temp->value;
    }
    public function getFront()
    {
        if($this->isEmpty())
        return null;
        echo "first value = " . $this->font->value . "\n";
    }
    public function getLast()
    {
        if($this->isEmpty())
        return null;
        echo "first value = " . $this->back->value . "\n";
    }
}
// hash functiona 
class ListNoden
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
    public function readNode()
    {
        return $this->data;
    }
}
class LinkedListtt
{
    public $firstnode; //first node in list
    public $lastnode; //last node in list
    public $count; // no of nodes
    public function __construct()
    {
        $this->firstnode = null;
        $this->lastnode = null;
        $this->count = 0;
    }
    public function isEmpty()
    {
        return $this->$firstnode == null;
    }
    public function insertFirst($data)
    {
        $link = new ListNoden($data);
        $link->next = $this->firstnode;
        $this->firstnode = &$link;
        if ($this->lastnode == null) // check if it is firstnode or not
        {
            $this->lastnode = &$link;
        }
        // if assign current obj adress to last node
        $this->count++; //count nodes
    }
    public function insertLast($data)
    {
        if ($this->firstnode != null) {

            $link = new ListNoden($data);
            $this->lastnode->next = $link;
            $link->next = null;
            $this->lastnode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }
    public function deleteNode($key)
    {
        $current = $this->firstnode;
        $previous = $this->firstnode;
         
        if($this->firstnode == null){
            return 0;
        }
        while ($current->data != $key) {
            if ($current->next == null) {
                return 0;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstnode) {
            if ($this->count == 1) {
                $this->lastnode = $this->firstnode;
            }
            $this->firstnode = $this->firstnode->next;
        } else {
            if ($this->lastnode == $current) {
                $this->lastnode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
        return 1;
    }
    public function readListInList()
    {
        $current = $this->firstnode;
        while ($current != null) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
        
    }
    public function getInt()
    {
        $num = readline();
        if (filter_var($num, FILTER_VALIDATE_INT) && (preg_match('/[0-9]/', $num))) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    public function size()
    {
        return $this->count;
    }
}
