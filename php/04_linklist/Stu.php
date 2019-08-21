<?php


/**
 共用的节点结构
 */
class Stu{
    public $name;
    public $no;
    public $next;
    public function __construct($name,$no)
    {
        $this->name=$name;
        $this->no=$no;
    }
}