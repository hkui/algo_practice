package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestRemoveDuplicates(t *testing.T) {

	nums:=[]int{1,1,1,2,3}
	l:=algo.RemoveDuplicates(nums)
	fmt.Println(l,nums)

}
