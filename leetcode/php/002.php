<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/8
 * Time: 19:36
 */
include "include/common.php";

function addTwoNumbers($l1, $l2) {
    $fromLow=0;
    while($l1 ||$l2){
        $num=$fromLow;
        if($l1){
            $num+=$l1->val%10;
            $l1=$l1->next;
        }
        if($l2){
            $num+=$l2->val%10;
            $l2=$l2->next;
        }
        if($num>9){
            $fromLow=1;
            $num=$num%10;
        }else{
            $fromLow=0;
        }
        if(!isset($head)){
            $head=new ListNode($num);
            $tmp=$head;
        }else{
            $tmp->next=new ListNode($num);
            $tmp=$tmp->next;
        }
    }
    //比l1与l2都长 且有进位
    if($fromLow>0){
        $tmp->next=new ListNode($fromLow);
    }
    return $head;
}
$l1=createNodeList([1,3,6]);
$l2=createNodeList([2,7,5]);

print_r(addTwoNumbers($l1,$l2));


