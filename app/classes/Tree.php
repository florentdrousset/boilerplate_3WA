<?php
namespace app\classes;

class Tree implements \Iterator
{
    private $tree;
    private $stack;

    public function __construct ($tree)
    {
        $this->tree = $tree;
        $this->stack = [$tree];
    }

    public function current()
    {
        if ($this->valid()) {
            return $this->stack[0];
        } else {
            return NULL;
        }

    }

    public function next() {
        switch (true) {
            case (empty($this->stack)) :
                echo "Terminé";
                break;

            case (empty($this->stack[0])) :
            case (is_numeric($this->stack[0])) :
                echo "Dépile ";
                array_shift($this->stack);
                echo "!";
                $this->next();
                break;

            case (is_array($this->stack[0])) :
                $head = $this->stack[0][0];
                $cut = array_shift($this->stack[0]);
                array_unshift($this->stack, $head);
                break;

        }
    }

    public function rewind() {}

    public function valid() {
        return (!empty($this->stack));
    }

    public function key() {}
}

