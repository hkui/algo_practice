package algo.s002;

import algo.common.ListNode;

public class Solution {

    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        ListNode l=new ListNode();
        ListNode cur=l;

        int fromPrev=0;
        do{
            int num=fromPrev;
            if(l1!=null){
                num+=l1.val;
                l1=l1.next;
            }
            if(l2!=null){
                num+=l2.val;
                l2=l2.next;
            }
            if(num>9){
                fromPrev=1;
            }else {
                fromPrev=0;
            }
            ListNode node=new ListNode(num%10);
            cur.next=node;
            cur=node;
        }while (l1!=null || l2!=null);

        if(fromPrev>0){
            ListNode last=new ListNode(1);
            cur.next=last;
        }
        return l.next;
    }

    public static void main(String[] args) {
        Solution s=new Solution();
        ListNode l1=ListNode.createNode(9,9,9,9,9,9,9);
        ListNode l2=ListNode.createNode(9,9,9,9);
        ListNode node=s.addTwoNumbers(l1,l2);
        ListNode.printListNode(node);
    }
}
