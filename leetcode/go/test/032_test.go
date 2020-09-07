package test

import (
	"algo_practice/algo"
	"fmt"
	"regexp"
	"testing"
)

func TestLongestValidParentheses(t *testing.T)  {

	re, _ := regexp.Compile("\\s");

	tests:=[]string{
		"()",
		") () ) (()) ( ()() )",
	}
	for _,s:=range tests{
		res:=algo.LongestValidParentheses(re.ReplaceAllString(s,""))
		fmt.Println(res)
	}

}
