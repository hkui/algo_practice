package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestMaxArea(t *testing.T)  {
	heights:=[]int{1,8,6,2,5,4,8,3,7}
	res:=algo.MaxArea(heights)
	fmt.Println(res)
}
