<?php
/**
 * Date: 2020/1/13
 * Time: 19:17
 */

include 'include/common.php';

//逐一两两合并链表

class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $len=count($lists);
        $i=0;

        $alreay=$lists[0];
        while($i<$len-1){
            $alreay=$this->mergeTwo($alreay,$lists[$i+1]);
            $i++;
        }
        return $alreay;
    }

    function mergeTwo($node1,$node2){
        $node=new ListNode(null);
        $cur=$node;
        while($node1 && $node2){
            if($node1->val<$node2->val){
                $cur->next=$node1;
                $node1=$node1->next;
            }else{
                $cur->next=$node2;
                $node2=$node2->next;

            }
            $cur=$cur->next;
        }
        while($node1){
            $cur->next=$node1;
            $node1=$node1->next;
            $cur=$cur->next;
        }
        while($node2){
            $cur->next=$node2;
            $node2=$node2->next;
            $cur=$cur->next;
        }
        return $node->next;
    }
}

$lists=[
    createNodeList([1,3,5,7]),
    createNodeList([-1,6,9,10]),
    createNodeList([0,2,4,8]),
    createNodeList([-2]),
];
$so=new Solution();
$r=$so->mergeKLists($lists);
print_r($r);


