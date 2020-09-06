package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestLargestRectangleArea(t *testing.T)  {
	tests:=[][]int{
		//{4,2,0,3,2,4,3,4},
		{2,1,5,6,2,3},
		{0},
	}
	for _,s:=range tests{
		res:=algo.LargestRectangleArea(s)
		fmt.Println(res)
	}

}
