<?php
/**
 * Date: 2020/1/14
 * Time: 22:02
 */
include 'include/common.php';


class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        $ret=[];
        $toRev=$head;
        $retLen=0;
        while(true){
            $retLen++;
            $revinfo=$this->reverse($toRev,$k);
            $revLen=$revinfo[2];
            $remain=$revinfo[1];
            //没有待转换的了
            if(empty($remain)){
                if($revLen==$k){
                    $ret[]=$revinfo[0];
                }else{
                    $tmp=$this->reverse($revinfo[0],$revLen);
                    $ret[]=$tmp[0];
                }
                break;
            }else{
                $ret[]=$revinfo[0];
            }
            $toRev=$remain;
        }

        $node=$ret[0];
        $cur=$node;
        for($i=0;$i<$k-1;$i++){
            $cur=$cur->next;
        }

        for($j=1;$j<$retLen;$j++){
            $cur->next=$ret[$j];
            $cur=$cur->next;
            for($m=0;$m<$k-1;$m++){
                $cur=$cur->next;
            }

        }
       return $node;
    }

    /**
     * @param $list
     * @return mixed
     * 单链表的反转（指定反转几个）
     */
    function reverse($list,$k){
        $prev=null;
        $cur=  $list;
        $len=0;
        while($k>0){
            if(empty($cur)){
                break;
            }
            $len++;
            $next=$cur->next;
            $cur->next=$prev??null;
            $prev=$cur;
            $cur=$next;
            $k--;
        }
        return [
            $prev, //转换后的数组
            $cur,   //剩余未转换的
            $len ,//转换的长度
        ];
    }


}

$so=new Solution();

$list=createNodeList([1,2,3,4,5,6,7,8,9]);


$r=$so->reverseKGroup($list,1);
print_r($r);

