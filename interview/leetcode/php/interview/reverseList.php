<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/25
 * Time: 23:57
 */

include '../include/common.php';

class Solution{
    function reverseList($head){

        $cur=$head;
        $prev=null;
        while($cur){
            $next=$cur->next;
            $cur->next=$prev;
            $prev=$cur;
            if(empty($next)){
                break;
            }
            $cur=$next;
        }
    }
}

$list=createNodeList([1,2,3,4,5]);

$so=new Solution();
$so->reverseList($list);



