package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestLengthOfLongestSubstring(t *testing.T)  {

	tests:=[]string{
		" ",
		//"abcabcbb",
		//"bbbbb",
		//"pwwkew",
		//"abba",


	}
	for _,s:=range tests{
		res:=algo.LengthOfLongestSubstring(s)
		fmt.Println(res)


	}

}
