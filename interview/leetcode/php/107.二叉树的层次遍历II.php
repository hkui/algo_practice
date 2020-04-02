<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/2
 * Time: 21:07
 */
include "include/common.php";
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root) {
        if(empty($root)){
            return [];
        }
        $queue=[[$root,0]];
        $result=[];
        while($queue){
            [$item,$level]=array_shift($queue);
            $result[$level][]=$item->val;
            if($item->left){
                array_push($queue,[$item->left,$level+1]);
            }
            if($item->right){
                array_push($queue,[$item->right,$level+1]);
            }

        }
        $result=array_reverse($result);
        return $result;
    }

}

$root=createTreesByArr([]);
$so=new Solution();
$r=$so->levelOrderBottom($root);
print_r($r);