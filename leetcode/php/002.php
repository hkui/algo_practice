<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/8
 * Time: 19:36
 */
include "include/common.php";

function addTwoNumbers($l1, $l2)
{
    $fromLow = 0;
    while ($l1 || $l2) {
        $num = $fromLow;
        if ($l1) {
            $num += $l1->val;
            $l1 = $l1->next;
        }
        if ($l2) {
            $num += $l2->val;
            $l2 = $l2->next;
        }
        if ($num > 9) {
            $fromLow = 1;
            $num = $num % 10;
        } else {
            $fromLow = 0;
        }
        if (!isset($head)) {
            $head = new ListNode($num);
            $tmp = $head;
        } else {
            $tmp->next = new ListNode($num);
            $tmp = $tmp->next;
        }
    }
    //比l1与l2都长 且有进位
    if ($fromLow > 0) {
        $tmp->next = new ListNode($fromLow);
    }
    return $head;
}
function addTwoNumbers1($l1, $l2) {
    $fromLow=0;
    $node=new ListNode(null);
    $cur=$node;
    while($l1 ||$l2){
        $fromLow=$fromLow>9?1:0;
        if ($l1) {
            $fromLow += $l1->val;
            $l1 = $l1->next;
        }
        if ($l2) {
            $fromLow += $l2->val;
            $l2 = $l2->next;
        }
        $now=$fromLow%10;
        $curNode=new ListNode($now);
        $cur->next=$curNode;
        $cur=$cur->next;
    }
    if($fromLow>9){
        $curNode=new ListNode(1);
        $cur->next=$curNode;
    }
    return $node->next;
}

$l1 = createNodeList([1, 3, 6]);
$l2 = createNodeList([2, 7, 5]);

print_r(addTwoNumbers($l1, $l2));


