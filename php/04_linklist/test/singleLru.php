<?php
include "./../singleNode.php";
$len=10;
$arr=["a","b","c","d","e"];
$nodelList=nodeList::createNode($arr,10);
$nodelList->printNode();

echo '#######'.PHP_EOL;
$lruData=["php","a","d","e","go","js","f","g","b","i","c"];

foreach ($lruData as $v){
    echo $v."---";
    $nodelList->lru($v);
    echo $nodelList->printNode().PHP_EOL;
}












