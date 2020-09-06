<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/6
 * Time: 8:25
 */
include '../include/common.php';

//反转链表
function reverseList($head) {
    $prev=null;
    $cur=$head;
    while($cur){
        $next=$cur->next;
        $cur->next=$prev;
        $prev=$cur;
        if(!$next){
           break;
        }
        $cur=$next;
    }
    return $cur;
}

$nodes=createNodeList([1,2,3,4]);
print_r($nodes);
$h=reverseList($nodes);
print_r($h);


