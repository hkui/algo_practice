<?php

class Node
{
    public $data;
    public $left;
    public $right;
    public function __construct($data,$left=null,$right=null)
    {
        $this->data=$data;
        $this->left=$left;
        $this->right=$right;
    }

}