<?php

include "./../singleNode.php";


/**
 * @param Stu $head
 * @param $node_name
 * 查找某个元素的下标
 * 没有的话返回-1
 */
function findNode( $head,$node_name){
    $cur=$head->next;
    while($cur){
        if($cur->name==$node_name){
            return $cur;
        }

        $cur=$cur->next;
    }
    return -1;
}

$arr=["aa","b","c","d","php","go","eee"];
$nodeList=nodeList::createNode($arr,10);


$nodeList->printNode();
$nodeList->delNode(2);


echo '######### delete no=2'.PHP_EOL;
$nodeList->printNode();



$nodeList->reverse();
echo '########Reverse####'.PHP_EOL;
$nodeList->printNode();