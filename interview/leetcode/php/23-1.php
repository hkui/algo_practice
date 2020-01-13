<?php
/**
 * Date: 2020/1/13
 * Time: 19:17
 */

include 'include/common.php';

class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $len=count($lists);
        if($len==1){
            return $lists[0];
        }
        $ceilMid=ceil($len/2);

        $m=1;//需要两两合并的回数
        while($m<=$ceilMid){
            $i=0;
            while($i<$len-1){
                $nextIndex=pow(2,$m-1)+$i;
                if($nextIndex>$len-1){
                    break;
                }
                $lists[$i]=$this->mergeTwo($lists[$i],$lists[$nextIndex]);
                $i=$i+2*$m;

            }
            $m++;
        }
        return $lists[0];
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
    createNodeList([1,3]),
    createNodeList([-1]),
    createNodeList([2,6]),
//    createNodeList([3,7]),
];


//$lists=[
//    createNodeList([-10,-9,-9,-3,-1,-1,0]),
//    createNodeList([-5]),
//    createNodeList([4]),
//    createNodeList([-8]),
//    createNodeList([]),
//    createNodeList([-9,-6,-5,-4,-2,2,3]),
//    createNodeList([-3,-3,-2,-1,0])
//];

$so=new Solution();
$r=$so->mergeKLists($lists);
print_r($r);


