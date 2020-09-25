<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/24
 * Time: 23:10
 */

class Solution
{


    public function deleteNode($root,$key){
        if($root===null){
            return null;
        }
        if($key>$root->val){
           $root->right= $this->deleteNode($root->right,$key);
        }elseif ($key<$root->val){
            $root->left=$this->deleteNode($root->left,$key);
        }else{
            //1.叶子节点
            if(is_null($root->left) && is_null($root->right)){
                $root=null;
            }
            elseif (!is_null($root->right)){
                $rightMin=$this->rightMin($root->right);
                $root->val=$rightMin;
                $root->right=$this->deleteNode($root->right,$rightMin);
            }elseif (!is_null($root->left)){
                //找左子树最大的值
                $leftMax=$this->leftMax($root->left);
                $root->val=$leftMax;
                $root->left=$this->deleteNode($root->left,$leftMax);

            }
        }
        return $root;
    }
    //左边子树的最大节点数
    public function leftMax($root){
        while(!is_null($root->right)){
            $root=$root->right;
        }
        return $root->val;
    }
    public function rightMin($root){
        while(!is_null($root->left)){
            $root=$root->left;
        }
        return $root->val;
    }
}

include 'include/common.php';

//$r1=createTreesByArr([5,3,6,2,4,null,7]);




$tests=[
    [[5,3,6,2,4,null,7],5],
//    [[0],0],
//    [[5,3,6,2,4,null,7],5],
//    [[5,3,6,2,4,null,7],7],
//    [[1,null,2],1],


];
$so=new Solution();
foreach ($tests as $t){
    $r = $so->deleteNode(createTreesByArr($t[0]), $t[1]);
    print_r($r);
}

