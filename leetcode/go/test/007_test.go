package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestReverse(t *testing.T)  {
	rev:=algo.Reverse(2147483648)
	fmt.Println(rev)

}
