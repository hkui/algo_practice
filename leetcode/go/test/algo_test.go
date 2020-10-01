package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

var a []int
var res [][]int


func Test46Permute(t *testing.T)  {

	tests:=[][]int{
		//[]int{1,2,3},
		//[]int{1},
		//[]int{5,4,6,2},
		[]int{1,2,3,4},
	}

	for _,v:=range tests{
		res:=algo.Permute(v)
		fmt.Println(res)
	}

}

