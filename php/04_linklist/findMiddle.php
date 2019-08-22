<?php
include "singleNode.php";
$len=10;
$arr=["a","b","c","d","e"];
$nodelList=nodeList::createNode($arr,10);
$nodelList->printNode();

$mid=$nodelList->findMiddle();
print_r($mid->name);