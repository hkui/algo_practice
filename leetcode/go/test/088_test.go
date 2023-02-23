package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestMerge(t *testing.T)  {
	nums1:=[]int{1,3,5,0,0,0}
	m:=3
	nums2:=[]int{2,4,5}
	n:=len(nums2)

	algo.Merge(nums1,m,nums2,n)
	fmt.Printf("nums1=%++v\n",nums1)

}
