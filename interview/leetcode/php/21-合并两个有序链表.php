<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/10
 * Time: 17:24
 */


include 'include/common.php';



class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $head=new ListNode(null);
        $node=$head;

        while($l1 && $l2){
            if($l1->val<$l2->val){
                $node->next=$l1;
                $l1=$l1->next;
            }else{
                $node->next=$l2;
                $l2=$l2->next;
            }
            $node=$node->next;
        }
        while($l1){
            $node->next=$l1;
            $l1=$l1->next;
            $node=$node->next;
        }
        while($l2){
            $node->next=$l2;
            $l2=$l2->next;
            $node=$node->next;
        }
       return $head->next;
    }
}

$l1=new ListNode(1);
$l1->next=new ListNode(3);
$l1->next->next=new ListNode(5);
$l1->next->next->next= new ListNode(7);

$l2=new ListNode(2);
$l2->next=new ListNode(4);

$so=new Solution();
$r=$so->mergeTwoLists($l1,$l2);
print_r($r);

//print_r($l1);
//print_r($l2);





