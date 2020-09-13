package test

import (
	"algo_practice/algo"
	"testing"
)

func TestMergeTwoLists(t *testing.T)  {

 	res:=algo.MergeTwoLists(algo.CreateNodeList([]int{1,3,5}),algo.CreateNodeList([]int{2,4}))
	algo.PrintNode(res)

}
