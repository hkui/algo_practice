<?php
/**
 * 删除链表的倒数第N个节点
 *  https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/
 * */

include 'include/common.php';

class Solution
{

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $fast=$slow=$head;
        for($i=0;$i<$n;$i++){
            $fast=$fast->next;
        }
        $prev=null;
        while($fast){
            $fast=$fast->next;
            $prev=$slow;
            $slow=$slow->next;
        }
        if(empty($prev)){
            return $head->next;
        }
        $prev->next=$slow->next;
        return $head;
    }
}



$arr=["a","b","c","d",'e','f','g','h'];
$nodeList=createNodeList($arr);

$so=new Solution();
$r=$so->removeNthFromEnd($nodeList,7);
print_r($r);
