package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

//测试中心扩展法
func TestLongestPalindrome( t *testing.T)  {
	tests:=[]string{
		"a",
		"ac",
		"aba",
		 "cbbd",
	}

	for _,s:=range tests{
		res:=algo.LongestPalindrome(s)
		fmt.Println(res)
	}

}
//测试暴力枚举法
func TestLongestPalindromeForce( t *testing.T)  {
	tests:=[]string{
		//"a",
		"ac",
		//"aba",
		// "cbbd",
	}

	for _,s:=range tests{
		res:=algo.LongestPalindromeForce(s)
		fmt.Println(res)
	}

}
//测试动态规划
func TestLongestPalindromeDp( t *testing.T)  {

	tests:=[]string{
		"a",
		"ac",
		"aba",
		"cbbd",

	}

	for _,s:=range tests{
		res:=algo.LongestPalindromeDp(s)
		fmt.Println(res)
	}

}
