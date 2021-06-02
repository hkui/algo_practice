package _02106

import (
	"fmt"
	"testing"
)

func Test350( t *testing.T)  {
	nums1:= []int{4,9,4,5}
	nums2:= []int{9,4,9,8,4}
	r:=intersectSorted(nums1,nums2)
	fmt.Println(r)
}