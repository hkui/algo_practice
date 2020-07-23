package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestReverseList(t *testing.T)  {
	arr:=[]int{1,2,3,4,5}
	head:=algo.CreateNodeList(arr)
	ShowLists(head)

	fmt.Println()

	r:=algo.ReverseList(head)

	ShowLists(r)
}

func ShowLists(node *algo.ListNode)  {
	for node!=nil{
		fmt.Println(node.Val)
		node=node.Next
	}
}