package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestIntersect(t *testing.T)  {
	tests:=[][][]int{
		{{4,5},{9,4,9,8,4}},
		{{1,2,2,1},{2,2}},
		//{{3,1,2},{1,1}},
	}


	for _,s:=range tests{
		res:=algo.Intersect2(s[0],s[1])
		fmt.Println(res)
	}

}
