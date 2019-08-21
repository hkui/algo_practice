<?php
include "singleNode.php";
$len=10;
$arr=["a","b","c","d","e"];
$nodelList=nodeList::createNode($arr,10);
$nodelList->printNode();
echo $nodelList->used;
echo PHP_EOL;
$nodelList->delNode('d');
$nodelList->printNode();
echo $nodelList->used;









