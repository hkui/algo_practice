package algo.s002;

import algo.common.ListNode;

public class Solution {

    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        ListNode l=new ListNode();
        ListNode cur=l;

        int fromPrev=0;
        do{
            int num=l1.val+l2.val+fromPrev;
            if(num>9){
                fromPrev=1;
            }else {
                fromPrev=0;
            }
            ListNode node=new ListNode(num%10);
            cur.next=node;
            cur=node;
            l1=l1.next;
            l2=l2.next;
        }while (l1!=null && l2!=null);

        while (l1!=null){
            int num=l1.val+fromPrev;
            if(num>9){
                fromPrev=1;
            }else {
                fromPrev=0;
            }
            ListNode node=new ListNode(num%10);
            cur.next=node;
            cur=node;
            l1=l1.next;
        }
        while (l2!=null){
            int num=l2.val+fromPrev;
            if(num>9){
                fromPrev=1;
            }else {
                fromPrev=0;
            }
            ListNode node=new ListNode(num%10);
            cur.next=node;
            cur=node;
            l2=l2.next;
        }

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
