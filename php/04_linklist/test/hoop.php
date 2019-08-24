<?php

/**
1.判断是否存在环
2.计算环的长度
3.如何找出环的连接点在哪
4.带环链表的长度是多少?
 */
include '../singleNode.php';

$arr=["a","b","c","d","e","f"];
$nodelList=nodeList::createNode($arr);

//让f指向c形成环
$nodelList->head->next->next->next->next->next->next->next=$nodelList->head->next->next->next;
var_dump($nodelList->hasHoop());

$hoopLen=$nodelList->hoopLen();
echo "hoopLen=".$hoopLen.PHP_EOL;

//连接点信息
//得到连接点和head到连接点的长度
$connect=$nodelList->findConnectPoint();

echo "connnectPointName=".$connect[0].PHP_EOL;


echo "链表长度=".($hoopLen+$connect[1]).PHP_EOL;





