<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/26
 * Time: 23:30
 */

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function countNodes($root) {
        if(empty($root)) return 0;
        $left=$this->countLevel($root->left);
        $right=$this->countLevel($root->right);
        if($left==$right){
            //左子树是满二叉树，左子树高度确定了
            $leftNodes=1<<$left;
            return $this->countNodes($root->right)+$leftNodes;
        }
        //右边子树高度确定了
        $rightNodes=1<<$right;
        return $this->countNodes($root->left)+$rightNodes;

    }
    function countLevel($root){
        $level=0;
        while($root){
            $level++;
            $root=$root->left;
        }
        return $level;
    }
}
include 'include/common.php';
$so=new Solution();

$tree=createTreesByArr([1,2,3,4,5,6]);
echo $so->countNodes($tree);