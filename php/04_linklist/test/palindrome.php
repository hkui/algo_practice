<?php
include '../singleNode.php';

$len=10;
$arr=["a","b","c","d","e"];
$nodelList=nodeList::createNode($arr,10);
$nodelList->printNode();

print_r($nodelList->isPalindrome());
