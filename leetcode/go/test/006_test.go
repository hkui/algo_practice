package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestConvert(t *testing.T)  {
	s:="abcdefghijk"
	s="PAYPALISHIRING"



	res:=algo.Convert(s,4)
	fmt.Println(res)

}

