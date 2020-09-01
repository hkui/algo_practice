package algo

func AddTwoNumbers(l1 *ListNode, l2 *ListNode) *ListNode {
	num := 0
	from_low := 0
	var tmp, head *ListNode

	for l1 != nil || l2 != nil {
		num=from_low
		if l1 != nil {
			num += l1.Val
			l1 = l1.Next
		}
		if l2 != nil {
			num += l2.Val;
			l2 = l2.Next
		}
		if num > 9 {
			num = num % 10
			from_low = 1
		} else {
			from_low = 0
		}

		if nil == head {
			tmp = &ListNode{Val: num}
			head = tmp

		} else {
			tmp.Next = &ListNode{Val: num}
			tmp = tmp.Next
		}

	}
	if from_low > 0 {
		tmp.Next = &ListNode{Val: from_low}
	}
	return head
}
