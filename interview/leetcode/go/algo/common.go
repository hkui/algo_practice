package algo

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
	return head
}

func SwapIntArr(arr []int,i int,j int)  {
	tmp:=arr[i]
	arr[i]=arr[j]
	arr[j]=tmp
}
