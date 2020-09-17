package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestMinPathSum(t *testing.T) {

	tests := [][]int{
		{1, 3, 1},
		{1, 5, 1},
		{4,2,1},
	}
	tests=[][]int{
		{1,2},
		{5,6},
		{1,1},
	}

	res:=algo.MinPathSum(tests)
	fmt.Println(res)



}
