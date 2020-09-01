<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/2/24
 * Time: 13:09
 */
include '../include/common.php';
class Solution {
    public $res=[];
    //递归中序
    public function inorderTraversal($root){
        if($root->left){
            $this->inorderTraversal($root->left);
        }
        $this->res[]=$root->val;

        if($root->right){
            $this->inorderTraversal($root->right);
        }
        return $this->res;
    }
    //栈中序
    public function inorder($root){
        $stack=[];
        $cur=$root;
        $res=[];

        while( $stack||$cur){
            while($cur){
                array_push($stack,$cur);
                $cur=$cur->left;
            }
            $last=array_pop($stack);
            $res[]=$last->val;
            $cur=$last->right;

        }

        return $res;
    }
    public function postorderTraversal($root) {
        if($root->left){
            $this->postorderTraversal($root->left);
        }
        if($root->right){
            $this->postorderTraversal($root->right);
        }
        $this->res[]=$root->val;
        return $this->res;
    }
    //栈后序列
    public function postorder($root){
        $stack=[];
        $cur=$root;
        $res=[];
        $process_right=[];//记录第二次进入

        while($cur || !empty($stack)){
            while($cur){
                array_push($stack,$cur);
                $cur=$cur->left;
            }
            $last=$stack[count($stack)-1];

            if(empty($last->right)|| in_array($last,$process_right)){
                array_pop($stack);
                $res[]=$last->val;
            }else{
                $process_right[]=$last;
                $cur=$last->right;
            }
        }
        return $res;
    }
    public function preorder($root){
        $stack=[];
        $res=[];
        $stack[]=$root;
        while(!empty($stack)){
            $cur=array_pop($stack);
            if(empty($cur)){
                continue;
            }
            $res[]=$cur->val;
            array_push($stack,$cur->right);
            array_push($stack,$cur->left);

        }
        return $res;

    }

}


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


/*$solution=new Solution();
$r=$solution->inorderTraversal($treenode1);
echo implode(',',$r);
echo PHP_EOL;

$s1=new Solution();
$r1=$s1->inorder($treenode1);
echo implode(',',$r1);
echo PHP_EOL;*/

/*$so=new Solution();
$r3=$so->postorderTraversal($treenode1);
print_r($r3);

$so3=new Solution();
$r3=$so3->postorder($treenode1);
print_r($r3);*/

$so3=new Solution();
$r3=$so3->preorder($treenode1);
print_r($r3);

