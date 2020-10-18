package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

var res [][]int
type intArr []int


func Test46Permute(t *testing.T)  {

	tests:=[][]int{
		//[]int{1,2,3},
		//[]int{1},
		//[]int{5,4,6,2},
		[]int{1,2,3,4},
	}
	for _,v:=range tests{
		res:=algo.Permute(v)
		fmt.Println(res)
	}

}


type test33one struct{
	intArr
	int
}
func Test33(t *testing.T)  {
	tests:=[]test33one{
		{intArr{5,6,7,8,9,1,2,3,4},3},
		{intArr{4,5,6,7,0,1,2},4},
		{intArr{5,1,3},5},
		{intArr{5,1,2,3,4},1},
	}
	for _,v :=range tests{
		index:=algo.Search(v.intArr,v.int)
		fmt.Println(index)
	}
}

