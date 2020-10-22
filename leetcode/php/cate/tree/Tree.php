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
    //-------------stack方式---------------

    //前序遍历 根左右 栈的方式
    /**
     * @param $root  TreeNode
     */
    public function preOrderStack($root){
        $ret=[];
        $stack=[$root];
        while($stack){
            $cur=array_pop($stack);
            if(empty($cur)){
                continue;
            }
            $ret[]=$cur->val;
            array_push($stack,$cur->right);
            array_push($stack,$cur->left);
        }
        return $ret;
    }
    /**
     * 中序 左根右
     * @param $root  TreeNode
     */
    public function inOrderStack($root){
        $ret=[];
        $cur=$root;
        $stack=[];
        while($cur ||!empty($stack)){
            if($cur){
                array_push($stack,$cur);
                $cur=$cur->left;
            }else{
                $last=array_pop($stack);
                $ret[]=$last->val;
                $cur=$last->right;

            }
        }
        return $ret;
    }
    /**
     * @param $root  TreeNode
     * 左右根
     */
    public function postOrderStack($root)
    {

    }


}


$tree = createTreesByArr([1, 2, 3, 4, 5, 6, 7]);

$so=new Tree();
$r=$so->inOrderStack($tree);
print_r($r);
