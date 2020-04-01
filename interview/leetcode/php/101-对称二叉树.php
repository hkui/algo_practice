<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/1
 * Time: 21:22
 */
error_reporting(0);
include "include/common.php";

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        $queue[]=[$root,0];
        $popArr=[];
        while($queue){
            $pop=array_shift($queue);
            [$item,$level]=$pop;
            if($level>0){
                $popArr[$level][]=$item;
            }
            if(empty($item)){
                continue;
            }
            //左边有
            if(isset($item->left)){
                array_push($queue,[$item->left,$level+1]);
                if(isset($item->right)){
                    array_push($queue,[$item->right,$level+1]);
                }else{
                    //右边没有时的占位
                    array_push($queue,[null,$level+1]);
                }

            }else{
                if(isset($item->right)){
                    array_push($queue,[null,$level+1]);
                    array_push($queue,[$item->right,$level+1]);
                }else{
                    array_push($queue,[null,$level+1]);
                    array_push($queue,[null,$level+1]);
                }
            }

        }
        if(empty($popArr)){
            return true;
        }

        foreach ($popArr as $levelData){
            $len=count($levelData);
            if($len%2!=0){
                return false;
            }
            $mid=$len/2;
            for($i=0;$i<$mid;$i++){
                if($levelData[$i]->val!==$levelData[$len-$i-1]->val){
                    return false;
                }
            }

        }
        return true;
    }

}
$tree=new TreeNode(1);

$left=new TreeNode(2);
$right=new TreeNode(2);


$left_right=new TreeNode(3);

$right_left=new TreeNode(null);
$right_right=new TreeNode(3);

$tree->left=$left;
$tree->right=$right;


$left->right=$left_right;

$right->right=$right_right;

//print_r($tree);

$so=new Solution();
$r=$so->isSymmetric($tree);
var_dump($r);


//[1,2,2,null,3,null,3]
//[2,3,3,4,5,5,4,null,null,8,9,null,null,9,8]



