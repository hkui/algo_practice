package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestLongestPalindrome( t *testing.T)  {
	tests:=[]string{
		//"abc",
		"aba",
		 "cbbd",
	}


	s:="abc"
	fmt.Println(s[1:3])

	for _,s:=range tests{
		res:=algo.LongestPalindrome(s)
		fmt.Println(res)
	}


}
