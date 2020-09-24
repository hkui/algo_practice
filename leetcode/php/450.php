<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/24
 * Time: 23:10
 */

class Solution
{

    /**
     * @param TreeNode $root
     * @param Integer $key
     * @return TreeNode
     */
    public static function deleteNode($root, $key)
    {

        $cur = $root;
        $parent = null;
        $left = true;
        while ($cur) {
            if ($cur->val == $key) {

                if ($cur->left && $cur->right) {

                    //在左子树找最大的节点
                    /*$maxLeftp = $cur; //找到时，最大节点的父节点
                    $tmpCur = $cur->left;
                    while ($tmpCur && $tmpCur->right) {
                        $maxLeftp = $tmpCur;
                        $tmpCur = $tmpCur->right;
                    }

                    if ($parent) {
                        if ($left) {
                            $parent->left = $tmpCur;
                        } else {
                            $parent->right = $tmpCur;
                        }
                    }else{
                        //根节点被删除
                        $root=$tmpCur;
                    }

                    if ($cur->left != $tmpCur) {
                        $tmpCur->left = $cur->left;
                    }

                    $tmpCur->right = $cur->right;
                    $maxLeftp->right = null;*/


                    //在右子树找最小的


                    $minRightp=$cur;

                    $tmpCur=$cur->right;

                    while ($tmpCur && $tmpCur->left){
                        $minRightp=$tmpCur;
                        $tmpCur=$tmpCur->left;
                    }
                    if($parent){
                        if($left){
                            $parent->left=$tmpCur;
                        }else{
                            $parent->right=$tmpCur;
                        }
                    }else{
                        $root=$tmpCur;
                    }
                    if($cur->right!=$tmpCur){
                        $tmpCur->right=$cur->right;
                    }
                    $tmpCur->left=$cur->left;
                    $minRightp->left=null;


                    return $root;
                }

                if ($cur->left) {
                    if($parent){
                        if ($left) {
                            $parent->left = $cur->left;
                        } else {
                            $parent->right = $cur->left;
                        }
                        return $root;
                    }

                    return $cur->left;


                } elseif ($cur->right) {
                    if($parent){
                        if($left){
                            $parent->left = $cur->right;
                        }else{
                            $parent->right = $cur->right;
                        }
                        return $root;
                    }else{
                        //根被删除
                        return $cur->right;

                    }

                }else{
                    //待删除的没有子节点
                    if($parent){
                        if ($left) {
                            $parent->left = null;
                        } else {
                            $parent->right = null;
                        }
                        return $root;
                    }
                    //删除只有1个节点的根
                    return null;
                }

            } elseif ($cur->val > $key) {
                $parent = $cur;
                $cur = $cur->left;
                $left = true;
            } else {
                $parent = $cur;
                $cur = $cur->right;
                $left = false;
            }
        }
        return $root;
    }
}

include 'include/common.php';

print_r(createTreesByArr([1,0,15,null,null,4,35,3,8,25,49,2,null,5,12,23,27,47,null,null,null,null,7,11,13,19,24,26,31,40,48,6,null,9,null,null,14,17,21,null,null,null,null,30,33,39,42,null,null,null,null,null,10,null,null,16,18,20,null,28,null,32,34,36,null,41,44,null,null,null,null,null,null,null,null,null,29,null,null,null,null,null,37,null,null,43,46,null,null,null,38,null,null,45]));
die;

$tests=[
//    [[5,3,6,2,4,null,7],3],
//    [[0],0],
//    [[5,3,6,2,4,null,7],5],
//    [[5,3,6,2,4,null,7],7],
//    [[1,null,2],1],
    [
        [1,0,15,null,null,4,35,3,8,25,49,2,null,5,12,22,27,47,null,null,null,
            null,7,11,13,19,24,26,31,40,48,6,null,9,null,null,14,17,21,23,null,null,null,30,33,39,42,
            null,null,null,null,null,10,null,null,16,18,20,null,null,null,28,null,32,34,36,null,41,44,null,
            null,null,null,null,null,null,null,null,29,null,null,null,null,null,37,null,
            null,43,46,null,null,null,38,null,null,45],22],

];
foreach ($tests as $t){
    $r = Solution::deleteNode(createTreesByArr($t[0]), $t[1]);
    print_r($r);
}

