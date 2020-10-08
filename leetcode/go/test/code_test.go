package test

/**
code下的代码测试
*/
import (
	"algo_practice/code/bsearch"
	"fmt"
	"testing"
)

type arr []int

type arrOne struct {
	arr
	int
}

/**
测试二分查找
*/
func TestBsearch(t *testing.T) {
	tests := []arrOne{
		{arr{1, 2, 3}, 2},
		{arr{1, 2, 3, 4, 5, 6}, 7},
	}
	for _, test := range tests {
		r := bsearch.Bsearch(test.arr, test.int)
		fmt.Println(r)
	}
	fmt.Println()
	for _, test := range tests {
		r := bsearch.BsearchRecursion(test.arr, test.int)
		fmt.Println(r)
	}

}
