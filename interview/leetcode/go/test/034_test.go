package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)


type testDatas []([]interface{})

func TestSearchRange( t *testing.T)  {
	tests:=testDatas{
		{[]int{1,2,3,4},2},
		{[]int{5,7,7,8,8,10},11},

	}
	for _,v:=range tests{
		//fmt.Printf("v[0]=%v,%T\n",v[0],v[0])

		res:=algo.SearchRange(v[0].([]int),v[1].(int))
		fmt.Println(res)
	}
}
