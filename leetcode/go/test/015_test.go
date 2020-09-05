package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestThreeSum(t *testing.T)  {
	test:=[]int{-1, 0, 1, 2, -1, -4}
	res:=algo.ThreeSum(test)
	fmt.Println(res)
}

