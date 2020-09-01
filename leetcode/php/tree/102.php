<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/6
 * Time: 23:30
 * 二叉树的层次遍历
 */

include '../include/common.php';

$treenode1 = new TreeNode(1);
$treenode2 = new TreeNode(2);
$treenode3 = new TreeNode(3);
$treenode4 = new TreeNode(4);
$treenode5 = new TreeNode(5);
$treenode6 = new TreeNode(6);
$treenode7 = new TreeNode(7);
$treenode8 = new TreeNode(8);
$treenode9 = new TreeNode(9);
$treenode10 = new TreeNode(10);
$treenode11 = new TreeNode(11);
$treenode12 = new TreeNode(12);

$treenode1->left = $treenode2;
$treenode1->right = $treenode3;


$treenode2->left = $treenode4;
$treenode2->right = $treenode5;

$treenode3->left = $treenode6;
$treenode3->right = $treenode7;

$treenode4->left = $treenode8;
$treenode4->right = $treenode9;

$treenode5->left = $treenode10;
$treenode5->right = $treenode11;

$treenode6->left = $treenode12;
print_r($treenode1);

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        $res=[];
        if(empty($root)){
            return $res;
        }
        $queue=[];
        $queue[]=[0,$root];
        while($queue){
            [$level,$node]=array_shift($queue);
            echo $node->val.PHP_EOL;
            if($node->left){
                array_push($queue,[$level+1,$node->left]);
            }
            if($node->right){
                array_push($queue,[$level+1,$node->right]);
            }
            $res[$level][]=$node->val;
        }
        return $res;
    }
}

$s=new Solution();
$s->levelOrder($treenode1);



