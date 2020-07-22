package main

import (
	"algo_practice/algo"
	"fmt"
)

func main() {

	tests:=[]string{
		"/home/",
		"/../",
		"/home//foo/",
		"/a/./b/../../c/",
		"/a/../../b/../c//.//",
		"/a//b////c/d//././/..",
	}
	for _,s:=range tests{
		fmt.Println(algo.Algo71_simplifyPath(s))
	}


}
