package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestRob(t *testing.T)  {
	tests:=[][]int{
		[]int{1,2,3,1},
		[]int{2,1,1,2},
	}
	for _,v:=range tests{
		res:=algo.Rob(v)
		fmt.Println(res)
	}


}