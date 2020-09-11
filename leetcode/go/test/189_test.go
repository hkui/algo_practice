package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestRotate(t *testing.T)  {
	nums:=[]int{1,2,3,4,5,6}
	target:=2
	algo.Rotate(nums,target)
	fmt.Printf("res=%+v\n",nums)

}

