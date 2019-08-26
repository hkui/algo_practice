<?php

include "node.php";

class Tree{
    public $root;
    public function __construct($data)
    {
        if($data!=null){
            $this->root=new Node($data);
        }
    }
    public function insert($data){
        
    }
}

$nodea=new node("a");
$nodeb=new node("b");
$nodec=new node("c");
$noded=new node("d");
$nodee=new node("e");
$nodef=new node("f");
$nodeg=new node("g");


$nodea->left=$nodeb;
$nodea->right=$nodec;

$nodeb->left=$noded;
$nodeb->right=$nodee;

$nodec->left=$nodef;
$nodec->right=$nodeg;

//前序遍历
function preOrder($root){
    if($root){
        echo $root->data." ";
        preOrder($root->left);
        preOrder($root->right);

    }
}
function inOrder($root){
    if($root){
        inOrder($root->left);
        echo $root->data." ";
        inOrder($root->right);

    }
}

function postOrder($root){
    if($root){
        postOrder($root->left);
        postOrder($root->right);
        echo $root->data." ";

    }
}
preOrder($nodea);
echo PHP_EOL;

inOrder($nodea);
echo PHP_EOL;
postOrder($nodea);
echo PHP_EOL;






