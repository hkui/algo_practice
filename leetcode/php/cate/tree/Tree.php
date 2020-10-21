<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/20
 * Time: 22:48
 */
include '../../include/common.php';

class Tree
{
    public $retPreorder = [];
    public $retInorder = [];
    public $retPostorder = [];

    //前序遍历 根左右

    /**
     * @param $root  TreeNode
     */
    public function preOrder($root)
    {
        if (empty($root)) return [];
        $this->retPreorder[] = $root->val;
        $this->preOrder($root->left);
        $this->preOrder($root->right);
        return $this->retPreorder;
    }
    /**
     * @param $root  TreeNode
     * 左根右
     */
    public function inOrder($root)
    {
        if (empty($root)) return [];

        $this->inOrder($root->left);
        $this->retInorder[] = $root->val;
        $this->inOrder($root->right);
        return $this->retInorder;


    }
    /**
     * @param $root  TreeNode
     * 左右根
     */
    public function postOrder($root)
    {
        if (empty($root)) return [];
        $this->postOrder($root->left);
        $this->postOrder($root->right);
        $this->retPostorder[] = $root->val;
        return  $this->retPostorder;
    }
}


$tree = createTreesByArr([1, 2, 3, 4, 5, 6, 7, 8, 9]);

$so=new Tree();
$r=$so->postOrder($tree);
print_r($r);
