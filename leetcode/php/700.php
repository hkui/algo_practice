<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/24
 * Time: 22:57
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    public static function searchBST($root, $val) {
        while($root){
            if($root->val==$val){
                return $root;
            }
            if($val<$root->val){
                $root=$root->left;
            }else{
                $root=$root->right;
            }
        }
        return null;
    }
}
include 'include/common.php';

$root=createTreesByArr([4,2,7,1,3]);

$r=Solution::searchBST($root,2);
print_r($r);
