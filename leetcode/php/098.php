<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/24
 * Time: 0:24
 */

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     * 方法1 递归(深度优先)
     */
    function isValidBST($root) {
        return $this->isBST($root,null,null);
    }
    function isBST($node,$min,$max){
       if($min!==null){
           if($node->val<=$min){
               return false;
           }
       }
       if($max!==null){
           if($node->val>=$max){
               return false;
           }
       }
       if($node->left){
           $r=$this->isBST($node->left,$min,$node->val);
           if(!$r){
               return false;
           }
       }
       if($node->right){
           $r=$this->isBST($node->right,$node->val,$max);
           if(!$r){
               return false;
           }
       }
       return true;
    }
}
include  'include/common.php';
$so=new Solution();
#$r=$so->isValidBST(createTreesByArr([9,7,15,3,10]));
$tree=createTreesByArr([0,null,-1]);
print_r($tree);
$r=$so->isValidBST($tree);
var_dump($r);