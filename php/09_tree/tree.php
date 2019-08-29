<?php

include "node.php";

class Tree
{
    public $root;

    public function __construct($data)
    {
        $this->root = new Node($data);
    }

    public function insert($data)
    {
        $cur = $this->root;
        $dataNode = new Node($data);
        while ($cur) {
            if ($data < $cur->data) {
                if ($cur->left) {
                    $cur = $cur->left;
                } else {
                    $cur->left = $dataNode;
                    return;
                }

            } elseif ($data >= $cur->data) {
                if ($cur->right) {
                    $cur = $cur->right;
                } else {
                    $cur->right = $dataNode;
                    return;
                }

            }
        }

    }

    public function find($data)
    {
        $cur = $this->root;
        while ($cur) {
            if ($data == $cur->data) {
                return $cur;
            }
            if ($data > $cur->data) {
                $cur = $cur->right;
            } else {
                $cur = $cur->left;
            }
        }
    }

    /**
     * @param $data
     * 找到并且删除
     */
    public function delete($data)
    {
        $cur = $this->root;
        $parent = null;
        $left = 0;
        //找到节点
        while ($cur) {
            if ($data == $cur->data) {
                break;
            }
            $parent = $cur;
            if ($data > $cur->data) {
                $cur = $cur->right;
                $left = 0;
            } else {
                $cur = $cur->left;
                $left = 1;
            }
        }


        //没有叶子节点
        if (empty($cur->left) && empty($cur->right)) {
            //说明要删除的节点时根节点，总共就一个元素
            if ($parent == null) {
                $this->root = null;
                return;
            }
            //不是根节点，且无叶子节点
            if ($left) {
                $parent->left = null;
            } else {
                $parent->right = null;
            }
            return;
        }
        if ($cur->left && $cur->right) {
            //找到最小的右子节点 然后放到要删除的节点上
            $rightMinParent = $cur;
            $rightMin = $cur->right;
            while ($rightMin) {
                if ($rightMin->left) {
                    $rightMinParent = $rightMin;
                    $rightMin = $rightMin->left;
                } else {
                    break;
                }
            }

            if ($parent == null) {
                $this->root = $rightMin;

            } else {
                if ($left) {
                    $parent->left = $rightMin;
                } else {
                    $parent->right = $rightMin;
                }

            }

            $rightMinParent->left = null;
            $rightMin->left = $cur->left;
            $rightMin->right = $cur->right;
            return;
        }

        //有1个叶子节点，左节点或者右节点
        if ($cur->left || $cur->right) {

            if ($parent == null) {
                $this->root = $cur;
                return;
            }
            //只有左子树
            if ($cur->left) {
                if ($left) {
                    $parent->left = $cur->left;
                } else {
                    $parent->right = $cur->left;
                }
                return;
            }

            //只有右子树
            if ($left) {
                $parent->left = $cur->right;
            } else {
                $parent->right = $cur->right;
            }
            return;

        }


    }

    //前序遍历
    public function preOrder($root)
    {
        if ($root) {
            echo $root->data . " ";
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }
    }

//中序遍历
    public function inOrder($root)
    {
        if ($root) {
            $this->inOrder($root->left);
            echo $root->data . " ";
            $this->inOrder($root->right);
        }
    }

//后序遍历
    public function postOrder($root)
    {
        if ($root) {
            $this->postOrder($root->left);
            $this->postOrder($root->right);
            echo $root->data . " ";

        }
    }
}











