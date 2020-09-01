package algo

import (
	"reflect"
)


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


