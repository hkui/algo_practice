<?php
/**
 * Created by PhpStorm.
 * User: huangkui@lepu.cn
 * Date: 2020/9/27
 * Time: 18:49
 * 二叉树剪枝
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function pruneTree($root) {
        if(empty($root))return null;

        $root->left=$this->pruneTree($root->left);
        $root->right=$this->pruneTree($root->right);

        if(empty($root->left) && empty($root->right)){
            if($root->val==0){
                $root=null;
            }
        }
        return $root;
    }
}
include 'include/common.php';
$so=new Solution();
$root=createTreesByArr([1,1,0,1,1,0,1,0]);



$r=$so->pruneTree($root);
print_r($r);

