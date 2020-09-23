<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/24
 * Time: 0:09
 */

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if(empty($root)) return [];
        $stack=[[$root,0]];
        $ret=[];
        while($out=array_shift($stack)){
            list($node,$level)=$out;
            $ret[$level][]=$node->val;
            if($node->left){
                array_push($stack,[$node->left,$level+1]);
            }
            if($node->right){
                array_push($stack,[$node->right,$level+1]);
            }
        }
        return $ret;
    }
}