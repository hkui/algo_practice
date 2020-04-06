<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/6
 * Time: 20:19
 */

include "include/common.php";
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        if(empty($root)) return [];
        $queue=[[$root,0]];
        $res=[];
        while($queue){
            [$node,$level]=array_shift($queue);
            $res[$level][]=$node->val;
            if($node->left){
                array_push($queue,[$node->left,$level+1]);
            }
            if($node->right){
                array_push($queue,[$node->right,$level+1]);
            }
        }

        foreach ($res as $level=>$v){
            if($level%2==1){
                $res[$level]=array_reverse($v);
            }
        }
        return $res;
    }


}

$so=new Solution();
$tests=[
    [3,9,20,null,null,15,7]
];
foreach ($tests as $t){
    $so->zigzagLevelOrder(createTreesByArr($t));
}



