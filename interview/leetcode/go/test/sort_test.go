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
func TestInsertSort(t  *testing.T)  {
	arr:=[]int{4,2,5,1,6,3}
	sort.InsertSort(arr)
	fmt.Println(arr)
}
func TestInsertSort1(t  *testing.T)  {
	arr:=[]int{4,2,5,1,6,3}
	sort.InsertSort1(arr)
	fmt.Println(arr)
}
