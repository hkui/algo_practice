package test

import (
	"algo_practice/algo"
	"testing"
)

func TestAddTwoNumbers(t *testing.T)  {
	var l1,l2 *algo.ListNode
	l1=algo.CreateNodeList([]int{2,4,3})
	l2=algo.CreateNodeList([]int{5,6,4})

	l1=algo.CreateNodeList([]int{1})
	l2=algo.CreateNodeList([]int{9,9})

	res:=algo.AddTwoNumbers(l1,l2)
	algo.PrintNode(res)


}
