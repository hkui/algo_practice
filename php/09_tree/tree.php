<?php

include "node.php";

class Tree{
    public $root;
    public function __construct($data)
    {
        $this->root=new Node($data);
    }
    public function insert($data){
        $cur=$this->root;
        $dataNode=new Node($data);
        while($cur){
            if($data<$cur->data){
                if($cur->left){
                    $cur=$cur->left;
                }else{
                    $cur->left=$dataNode;
                    return;
                }

            }elseif ($data>=$cur->data){
                if($cur->right){
                    $cur=$cur->right;
                }else{
                    $cur->right=$dataNode;
                    return;
                }

            }
        }

    }
    public function find($data){
        $cur=$this->root;
        while($cur){
            if($data==$cur->data){
                return $cur;
            }
            if($data>$cur->data){
                $cur=$cur->right;
            }else{
                $cur=$cur->left;
            }
        }
    }

    /**
     * @param $data
     * 找到并且删除
     */
    public function delete($data){
        $cur=$this->root;
        $parent=null;
        $left=0;
        //找到节点
        while($cur){
            if($data==$cur->data){
                break;
            }
            $parent=$cur;
            if($data>$cur->data){
                $cur=$cur->right;
            }else{
                $cur=$cur->left;
                $left=1;
            }
        }
        //没有叶子节点
        if(empty($cur->left) && empty($cur->right)){
            //说明是跟节点
            if($parent==null){
                $this->root=null;
            }else{
                if($left){
                    $parent->left=null;
                }else{
                    $parent->right=null;
                }
            }
        }elseif($cur->left ||$cur->right){
            if($cur->left){
                if($left){
                    $parent->left=$cur->left;
                }else{
                    $parent->right=$cur->left;
                }
            }else{
                if($left){
                    $parent->left=$cur->right;
                }else{
                    $parent->right=$cur->right;
                }
            }
        }else{
            //找到最小的右子节点
            


        }


    }
    //前序遍历
    public function preOrder($root){
        if($root){
            echo $root->data." ";
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }
    }
//中序遍历
    public function inOrder($root){
        if($root){
            $this->inOrder($root->left);
            echo $root->data." ";
            $this->inOrder($root->right);
        }
    }
//后序遍历
    public function postOrder($root){
        if($root){
            $this->postOrder($root->left);
            $this->postOrder($root->right);
            echo $root->data." ";

        }
    }
}











