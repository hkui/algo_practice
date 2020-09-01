<?php
/**
 * Date: 2020/1/17
 * Time: 11:51
 */

/**
 * Definition for a binary tree node.
 * 二叉树中序遍历，递归法
 *
 */
include '../include/common.php';
class Solution {
    public $ret=[];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $this->order($root);
        return $this->ret;
    }
    function order( $root ){
        if($root->left){
            $this->order($root->left);
        }
        $this->ret[]= $root->val;
        if($root->right){
            $this->order($root->right);
        }

    }

}

$treenode1=new TreeNode(1);
$treenode2=new TreeNode(2);
$treenode3=new TreeNode(3);
$treenode4=new TreeNode(4);
$treenode5=new TreeNode(5);
$treenode6=new TreeNode(6);
$treenode7=new TreeNode(7);
$treenode8=new TreeNode(8);
$treenode9=new TreeNode(9);
$treenode10=new TreeNode(10);
$treenode11=new TreeNode(11);
$treenode12=new TreeNode(12);

$treenode1->left=$treenode2;
$treenode1->right=$treenode3;


$treenode2->left=$treenode4;
$treenode2->right=$treenode5;

$treenode3->left=$treenode6;
$treenode3->right=$treenode7;

$treenode4->left=$treenode8;
$treenode4->right=$treenode9;

$treenode5->left=$treenode10;
$treenode5->right=$treenode11;

$treenode6->left=$treenode12;

$so=new Solution();

$r=$so->inorderTraversal($treenode1);
print_r($r);
















