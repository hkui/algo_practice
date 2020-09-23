<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/23
 * Time: 22:22
 */

include 'include/common.php';

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {

       return $this->steplen($root, 0);
    }

    function steplen($node, $step)
    {
        if (empty($node)) {
            return $step;
        }
        $leftDepth = $this->steplen($node->left, $step + 1);
        $rightDepth = $this->steplen($node->right, $step + 1);
        return max($leftDepth, $rightDepth);
    }

    #-----------------上面的更快-------------
    function maxDepth1($root){
        if(empty($root)) return 0;
        $left=call_user_func([$this,__METHOD__],$root->left);
        $right=call_user_func([$this,__METHOD__],$root->right);
        return max($left,$right)+1;
    }

    function dfs($root){
        if(empty($root)) return 0;
        $ret=[];
        $stack=[[$root,0]];

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
       return count($ret);
    }





}

$tree = createTreesByArr([3, 9, 20, null, null, 15, 7]);
$so = new Solution();
//echo $so->maxDepth1($tree);


echo $so->dfs(createTreesByArr(['a','b','c',null,'e','f','g']));
