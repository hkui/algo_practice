package algo

func HasCycle(head *ListNode) bool {
	if head == nil || head.Next == nil {
		return false;
	}
	slow := head
	fast := head
	for slow != nil && fast != nil {
		slow = slow.Next
		fast = fast.Next
		if fast == nil {
			return false
		}
		fast = fast.Next
		if slow == fast {
			return true;
		}
	}
	return false
}
