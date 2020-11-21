package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestRemoveElement(t *testing.T)  {
		res:=algo.RemoveElement([]int{1,2,3,4,2,5},2)
		fmt.Println(res)
}

