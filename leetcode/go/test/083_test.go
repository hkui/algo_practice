package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

func TestDeleteDuplicates(t *testing.T) {
	head := algo.CreateNodeListByArg(1, 2, 3, 3, 4)
	algo.PrintNode(head)
	fmt.Println("-----------")
	newHead := algo.DeleteDuplicates(head)
	algo.PrintNode(newHead)

}
