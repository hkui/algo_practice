package algo

import "fmt"

type ListNode struct {
	Val  int
	Next *ListNode
}
//根据数组创建1个单链表
func CreateNodeList(arr []int)(*ListNode){
	head:=&ListNode{}

	cur:=head
	count:=len(arr)
	for i:=0;i<count;i++{
		node:=ListNode{Val:arr[i]}
		cur.Next=&node
		cur=cur.Next

	}
	return head.Next
}
func PrintNode(node *ListNode)  {
	for node!=nil{
		fmt.Println(node.Val)
		node=node.Next
	}
}

func SwapIntArr(arr []int,i int,j int)  {
	tmp:=arr[i]
	arr[i]=arr[j]
	arr[j]=tmp
}
