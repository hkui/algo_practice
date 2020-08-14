package test

import (
	"algo_practice/algo/sort"
	"fmt"
	"testing"
)

func TestBubbleSort(t *testing.T)  {
	arr:=[]int{1,8,7,3,5,4}
	res:=sort.BubbleSort(arr)
	fmt.Println(res)
}
