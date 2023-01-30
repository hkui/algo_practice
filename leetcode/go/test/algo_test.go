package test

import (
	"algo_practice/algo"
	"fmt"
	"testing"
)

var res [][]int
type intArr []int

func Test001TwoSum(t *testing.T)  {
	nums:=[]int{2,7,8,0,11,15}
	target:=15
	res:=algo.TwoSum(nums,target)
	fmt.Printf("res=%+v\n",res)

}
func Test002AddTwoNumbers(t *testing.T)  {
	var l1,l2 *algo.ListNode
	l1=algo.CreateNodeListByArr([]int{2,4,3})
	l2=algo.CreateNodeListByArr([]int{5,6,4})

	l1=algo.CreateNodeListByArr([]int{1})
	l2=algo.CreateNodeListByArr([]int{9,9})

	res:=algo.AddTwoNumbers(l1,l2)
	algo.PrintNode(res)
}

func Test003LengthOfLongestSubstring(t *testing.T)  {

	tests:=[]string{
		" ",
		//"abcabcbb",
		//"bbbbb",
		//"pwwkew",
		//"abba",


	}
	for _,s:=range tests{
		res:=algo.LengthOfLongestSubstring(s)
		fmt.Println(res)
	}

}
func Test006Convert(t *testing.T)  {
	s:="abcdefghijk"
	s="PAYPALISHIRING"

	res:=algo.Convert(s,4)
	fmt.Println(res)

}
func Test007Reverse(t *testing.T)  {
	rev:=algo.Reverse(2147483648)
	fmt.Println(rev)

}
func Test009IsPalindrome(t *testing.T)  {
	tests:=[]int{
		123,
		121,
		1221,
	}
	for _,i:=range tests{
		r:=algo.IsPalindrome(i)
		fmt.Println(i,r)
	}

}
func Test011MaxArea(t *testing.T)  {
	heights:=[]int{1,8,6,2,5,4,8,3,7}
	res:=algo.MaxArea(heights)
	fmt.Println(res)
}
func Test014LongestCommonPrefix(t *testing.T)  {
	tests:=[][]string{
		{"flower","flow","flight"},
		{"cd","ab"},
	}
	for _,v:=range tests{
		res:=algo.LongestCommonPrefix(v)
		fmt.Println(res)
	}
}
func Test015ThreeSum(t *testing.T)  {
	test:=[]int{-1, 0, 1, 2, -1, -4}
	res:=algo.ThreeSum(test)
	fmt.Println(res)
}
func Test019RemoveNthFromEnd(t *testing.T)  {

	head:=algo.CreateNodeListByArr([]int{1,2,3,4,5,6})

	res:=algo.RemoveNthFromEnd(head,4)
	algo.PrintNode(res)

}
func Test020IsValid(t *testing.T)  {
	tests:=[]string{
		"{}",
	}
	for _,s:=range tests{
		res:=algo.IsValid(s)
		fmt.Println(res)
	}

}
func Test021MergeTwoLists(t *testing.T)  {

	res:=algo.MergeTwoLists(algo.CreateNodeListByArr([]int{1,3,5}),algo.CreateNodeListByArr([]int{2,4}))
	algo.PrintNode(res)
}
func Test027RemoveElement(t *testing.T)  {
	res:=algo.RemoveElement([]int{1,2,3,4,2,5},2)
	fmt.Println(res)
}


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

