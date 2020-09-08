package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestTwoSum(t *testing.T)  {
	nums:=[]int{2,7,8,0,11,15}
	target:=15
	res:=algo.TwoSum(nums,target)
	fmt.Printf("res=%+v\n",res)

}
