package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestMoveZeroes(t *testing.T)  {
	nums:=[]int{1,0,3,0,0,4,5}
	algo.MoveZeroes(nums)
	fmt.Println(nums)
}
