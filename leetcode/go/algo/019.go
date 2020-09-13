package algo

func RemoveNthFromEnd(head *ListNode, n int) *ListNode {
	leftN:=head
	for i:=1;i<n;i++{
		leftN=leftN.Next
	}
	fromHead:=head
	fromN:=leftN
	var prev *ListNode

	for fromN!=nil{
		fromN=fromN.Next
		if fromN==nil{
			break
		}
		prev=fromHead
		fromHead=fromHead.Next
		//退出循环时,fromHead就是倒数第n个节点
	}
	if prev== nil {
		return head.Next
	}else{
		prev.Next=fromHead.Next
	}
	return head
}
