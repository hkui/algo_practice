package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestCombinationSum2(t *testing.T)  {

	tests:=[][]interface{}{
		{[]int{1,2,7,6,1,5},8},
		//{[]int{2,3,6,7},7},
		//{[]int{2,3,5,7},8},

	}
	for _,v:=range tests{
		res:=algo.CombinationSum2(v[0].([]int),v[1].(int))
		fmt.Println(res)

	}
}