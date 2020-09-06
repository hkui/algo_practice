package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestIsValid(t *testing.T)  {
	tests:=[]string{
		"{}",
	}
	for _,s:=range tests{
		res:=algo.IsValid(s)
		fmt.Println(res)
	}

}