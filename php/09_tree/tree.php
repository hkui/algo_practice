<?php

namespace Algo_09_tree;

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
    //查找
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
        $to_delete_node = $this->root; //要删除的节点
        $to_delete_parent_node = null; //要删除节点的父节点
        $left = 0;
        //查找要删除的节点
        while ($to_delete_node) {
            if ($data == $to_delete_node->data) {
                break;
            }
            $to_delete_parent_node = $to_delete_node;
            if ($data > $to_delete_node->data) {
                $to_delete_node = $to_delete_node->right;
                $left = 0;
            } else {
                $to_delete_node = $to_delete_node->left;
                $left = 1;
            }
        }
        //没找到要删除的节点
        if (empty($to_delete_node)) {
            return;
        }

        //没有叶子节点
        if (empty($to_delete_node->left) && empty($to_delete_node->right)) {
            //说明要删除的节点是根节点，总共就一个元素
            if ($to_delete_parent_node == null) {
                $this->root = null;
                return;
            }
            //不是根节点，且无叶子节点
            if ($left) {
                $to_delete_parent_node->left = null;
            } else {
                $to_delete_parent_node->right = null;
            }
            return;
        }
        //有左节点和右节点 查右子树的最小节点
        if ($to_delete_node->left && $to_delete_node->right) {
            //找到最小的右子节点 然后放到要删除的节点上
            $rightMinParent = $to_delete_node;  //右子树的最小节点 的父节点
            $rightMin = $to_delete_node->right; //右子树的最小节点
            while ($rightMin->left) {
                $rightMinParent = $rightMin;
                $rightMin = $rightMin->left;
            }

            if ($to_delete_parent_node == null) {
                $this->root = $rightMin;
            } else {
                if ($left) {
                    $to_delete_parent_node->left = $rightMin;
                } else {
                    $to_delete_parent_node->right = $rightMin;
                }

            }
            $rightMin->left = $to_delete_node->left;
            $rightMinParent->left = null;


            if ($rightMin !== $to_delete_node->right) {
                $rightMin->right = $to_delete_node->right;
            }

            return;
        }

        //有1个叶子节点，左节点或者右节点

        //只有左子树
        if ($to_delete_node->left) {
            $to_delete_child_node = $to_delete_node->left;

        } else {
            //只有右子树
            $to_delete_child_node = $to_delete_node->right;
        }
        if (empty($to_delete_parent_node)) {
            $this->root = $to_delete_child_node;
        } else {
            if ($left) {
                $to_delete_parent_node->left = $to_delete_child_node;
            } else {
                $to_delete_parent_node->right = $to_delete_child_node;
            }
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

    /**
     * @param $queue
     * @param int $index 从队列(数组)的那个位置开始处理
     * 层级遍历
     * 首先把节点放入数组，记录放入数组的根节点个数index，把节点的左右子放入数组
     * 开始遍历数组queue(从index开始,子节点已经入队列的节点元素不再处理)，把左右子节点放入queue,index++
     * 持续上述过程，当节点没有子节点时，入队列过程结束，queue里节点的顺序即为层级遍历元素节点的顺序
     */
    public function levelOrder($queue, $index = 0)
    {
        for ($i = $index; $i < count($queue); $i++) {
            $node = $queue[$i];
            if ($node->left) {
                $queue[] = $node->left;
            } else {
                return $queue;
            }
            if ($node->right) {
                $queue[] = $node->right;
            } else {
                return $queue;
            }
            $index++;
        }
        return $queue;

    }



}














