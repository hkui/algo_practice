<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/4
 * Time: 21:14
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if(empty($root)) return 0;
        $queue=[[$root,0]];
        while($queue){
            [$node,$level]=array_shift($queue);
            if(empty($node->left) && empty($node->right)){
                return $level+1;
            }
            if($node->left){
                array_push($queue,[$node->left,$level+1]);
            }
            if($node->right){
                array_push($queue,[$node->right,$level+1]);
            }
        }
    }
   /* function maxDepth($root) {
        if(empty($root)) return 0;
        $queue=[[$root,0]];
        $res=[];
        while($queue){
            [$node,$level]=array_shift($queue);
            $res[$level][]=$node;
            if($node->left){
                array_push($queue,[$node->left,$level+1]);
            }
            if($node->right){
                array_push($queue,[$node->right,$level+1]);
            }
        }
        return count($res);
    }*/
    function maxDepth($root) {

        if(empty($root)) return 0;
        $left=$this->maxDepth($root->left);
        $right=$this->maxDepth($root->right);
        return max($left,$right)+1;
    }
}
include "include/common.php";

$tests=[
    [3,9,20,null,null,15,7]
];
$so=new Solution();
foreach ($tests as $t){
    echo $so->maxDepth(createTreesByArr($t)).PHP_EOL;
}
