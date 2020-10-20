<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/20
 * Time: 23:10
 * 二叉树的中序遍历
 */

include './include/common.php';

class Solution {

    private $ret=[];
    /**
     * @param TreeNode $root
     * @return Integer[]
     * 左根右
     */
    function inorderTraversal($root) {
        if(empty($root)){
            return [] ;
        }
        if($root->left){
            $this->inorderTraversal($root->left);
        }
        $this->ret[]=$root->val;
        $this->inorderTraversal($root->right);
        return $this->ret;
    }
}
$treenode1=createTreesByArr([1,2,3,4,5,6,7,8,9]);

$so=new Solution();

$r=$so->inorderTraversal($treenode1);
print_r($r);


