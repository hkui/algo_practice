package test

import (
	"algo_practice/algo"
	"testing"
)

func TestRemoveNthFromEnd(t *testing.T)  {

	head:=algo.CreateNodeList([]int{1,2,3,4,5,6})


	res:=algo.RemoveNthFromEnd(head,4)
	algo.PrintNode(res)

}

