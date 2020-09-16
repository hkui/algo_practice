package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestMinimumTotal(t *testing.T)  {
	tests:=[][]int{
		[]int{2},
		[]int{3,4},
		[]int{6,5,7},
		[]int{4,1,8,3},

	}
 	res:=algo.MinimumTotal(tests)
	fmt.Println(res)

}

