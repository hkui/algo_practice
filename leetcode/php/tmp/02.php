<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/1
 * Time: 22:56
 */

include '../include/common.php';

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $from_low=0;
        while($l1 || $l2){
            $num=0;
            $num+=$from_low;
            if($l1){
                $num+=$l1->val;
                $l1=$l1->next;
            }
            if($l2){
                $num+=$l2->val;
                $l2=$l2->next;
            }
            if($num>9){
                $num=$num%10;
                $from_low=1;
            }else{
                $from_low=0;
            }
            if(!isset($head)){
                $head=new ListNode($num);
                $tmp=$head;
            }else{
                $tmp->next=new ListNode($num);
                $tmp=$tmp->next;
            }

        }
        // 3,1,2
        // 7,3,9
        //说明最后面的进位了
        if($from_low>0){
            $tmp->next=new ListNode($from_low);
        }
        return $head;
    }
}

$l1=createNodeList([1,3,2]);
$l2=createNodeList([2,7,4]);

$so=new Solution();
$r=$so->addTwoNumbers($l1,$l2);
print_r($r);

