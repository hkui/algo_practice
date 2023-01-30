package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestReverseList(t *testing.T)  {
	arr:=[]int{1,2,3,4,5}
	head:=algo.CreateNodeListByArr(arr)
	algo.PrintNode(head)

	fmt.Println()

	r:=algo.ReverseList(head)

	algo.PrintNode(r)
}

