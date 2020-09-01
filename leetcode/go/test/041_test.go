package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestFirstMissingPositive(t *testing.T) {

	tests := [][]int{
		{1, 2, 0},
		{3, 4, -1, 1},
		//{7, 8, 9, 11, 12},
		{},
		{1},
		{3, -1, 23, 7, 21, 12, 8, 9, 18, 21, -1, 16, 1, 13, -3, 22, 23, 13, 7, 14},
	}
	for _,v:=range tests{
		fmt.Println(algo.FirstMissingPositive(v))
	}


}
