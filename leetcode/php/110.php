<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/26
 * Time: 0:16
 */

class Solution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root)
    {
        if (is_null($root)) return true;
        if (!$this->isBalanced($root->left) || !$this->isBalanced($root->right)) {
            return false;
        }
        $leftH = $this->height($root->left) + 1;
        $rightH = $this->height($root->right) + 1;
        if (abs($leftH - $rightH) > 1) {
            return false;
        }
        return true;
    }

    function height($root)
    {
        if (is_null($root)) return 0;
        $max = max($this->height($root->left), $this->height($root->right)) + 1;
        return $max;
    }
}
include "include/common.php";

$so=new Solution();
$r=$so->isBalanced(createTreesByArr([1,2,2,3,3,null,null,4,4]));
var_dump($r);