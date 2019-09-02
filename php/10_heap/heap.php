<?php
include_once '../09_tree/node.php';

class heap
{
    public $dataArr=[];
    public function insert($data){
        $this->dataArr[]=$data;
    }
}



