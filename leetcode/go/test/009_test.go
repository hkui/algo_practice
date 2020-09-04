package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestIsPalindrome(t *testing.T)  {
	tests:=[]int{
		123,
		121,
		1221,
	}
	for _,i:=range tests{
		r:=algo.IsPalindrome(i)
		fmt.Println(i,r)
	}

}
