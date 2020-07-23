package algo

import (
	"reflect"
)

type ListNode struct {
	Val  int
	Next *ListNode
}
//单链表反转
func ReverseList(head *ListNode) *ListNode {
	cur:=head
	var before *ListNode

	for cur!=nil{
		next:=cur.Next
		cur.Next=before

		before=cur
		if reflect.ValueOf(next).IsNil(){
			break
		}else {
			cur=next
		}
	}
	return cur
}

//根据数组创建1个单链表
func CreateNodeList(arr []int)(*ListNode){
	head:=&ListNode{}

	cur:=head
	len:=len(arr)
	for i:=0;i<len;i++{
		node:=ListNode{Val:arr[i]}
		cur.Next=&node
		cur=cur.Next

	}
	return head
}

