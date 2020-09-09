package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestLongestCommonPrefix(t *testing.T)  {

	tests:=[][]string{
		{"flower","flow","flight"},
		{"cd","ab"},
	}
	for _,v:=range tests{
		res:=algo.LongestCommonPrefix(v)
		fmt.Println(res)
	}



}
