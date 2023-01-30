package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestHasCycle(t *testing.T)  {
	arr:=[]int{1,2,3,4,5}
	head:=algo.CreateNodeListByArr(arr)

	algo.PrintNode(head)
	head.Next.Next=head

	fmt.Println()

	r:=algo.HasCycle(head)

	fmt.Println(r)
}

