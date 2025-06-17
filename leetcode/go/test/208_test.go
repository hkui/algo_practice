package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestTrieTree(t *testing.T) {
	trie :=algo.Constructor()
	//trie.Insert("app")
	trie.Insert("apple")

	fmt.Println(trie.StartsWith("ap"))
	fmt.Println(trie.Search("app"))
	//fmt.Printf("%#v",trie)
}
