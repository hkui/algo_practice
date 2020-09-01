<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/7/23
 * Time: 22:23
 */

include 'include/common.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $cur=$head;
        $before=null;
        while($cur){
            $next=$cur->next;
            $cur->next=$before;
            $before=$cur;
            if(empty($next)){
                break;
            }
            $cur=$next;

        }
        return $cur;
    }
}

$arr=[1,2,3,4,5];

$lists=createNodeList($arr);


$so=new Solution();
$r=$so->reverseList($lists);
print_r($r);

