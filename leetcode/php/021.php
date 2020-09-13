<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/10
 * Time: 17:24
 */


include 'include/common.php';

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
    if($l1){
        $node->next=$l1;
    }
    if($l2){
        $node->next=$l2;
    }
   return $head->next;
}


$r=mergeTwoLists(createNodeList([1,3,6]),createNodeList([2,5]));
print_r($r);






