package test

import (
	"fmt"
	"testing"
)

type TreeNode struct {
	Val int          // 根
	Left *TreeNode   //左节点
	Right *TreeNode  //右节点
}

// 递归
func searchBST(root *TreeNode, val int) *TreeNode {
	if root == nil || root.Val == val {
		return root
	}
	if root.Val > val {
		return searchBST(root.Left, val)
	} else {
		return searchBST(root.Right, val)
	}
}

func TestBst(t  *testing.T)  {
	//[4,2,7,1,3]
	root:= &TreeNode{}
	root.Val=4
	root.Left=&TreeNode{
		Val: 2,
		Left: &TreeNode{Val: 1},
		Right: &TreeNode{Val: 3},
	}
	root.Right=&TreeNode{Val: 7}
	tree1:=searchBST(root,2)
	fmt.Print(tree1.Val)

}
/**
		4
	2		7
1		3

 */
