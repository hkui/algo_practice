<?php
include "./../singleNode.php";
$len=10;
$arr=["a","b","c","d"];
$nodelList=nodeList::createNode($arr,10);
echo $nodelList->printNode().PHP_EOL;

$mid=$nodelList->findMiddle();
print_r($mid);