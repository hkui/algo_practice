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
            if($data<=$cur->data){
                if($cur->left){
                    $cur=$cur->left;
                }else{
                    $cur->left=$dataNode;
                    return;
                }

            }elseif ($data>$cur->data){
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

$tree=new Tree(5);
$tree->insert(2);
$tree->insert(3);
$tree->insert(6);
$tree->insert(7);
$tree->insert(7);
$tree->insert(7);
$tree->insert(8);
$tree->insert(0);

print_r($tree->root);

$r=$tree->find(7);
print_r($r);
$tree->inOrder($tree->root);



echo PHP_EOL;









