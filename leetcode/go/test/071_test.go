package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func Test071(t *testing.T) {
	tests := []string{
		"/home/",
		"/../",
		"/home//foo/",
		"/a/./b/../../c/",
		"/a/../../b/../c//.//",
		"/a//b////c/d//././/..",
	}
	for _, s := range tests {
		fmt.Println(algo.Algo71_simplifyPath(s))
	}
}
