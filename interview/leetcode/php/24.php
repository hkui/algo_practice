<?php

include "include/common.php";

/**
 * Class Solution
 * https://leetcode-cn.com/problems/swap-nodes-in-pairs/
 * 两两交换链表中的节点
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($lists)
    {
        $head=new ListNode(null);
        $head->next=$lists;

        $parent=$head;
        $cur=$parent->next;
        while($cur && $cur->next){
            $parent->next=$cur->next;

            $cur->next=$cur->next->next;
            $parent->next->next=$cur;

            $parent=$cur;
            $cur=$cur->next;
        }
        return $head->next;
    }
}

$lists=createNodeList([1,2,3,4]);



$so=new Solution();
$r=$so->swapPairs($lists);
print_r($r);

