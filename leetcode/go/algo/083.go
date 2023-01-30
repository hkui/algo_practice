package algo

func DeleteDuplicates(head *ListNode) *ListNode {
	cur := head
	for cur != nil {
		next := cur.Next
		for next != nil && cur.Val == next.Val {
			next = next.Next
		}
		cur.Next = next
		cur = next
	}
	return head
}
