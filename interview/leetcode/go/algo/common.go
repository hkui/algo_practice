package algo

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

