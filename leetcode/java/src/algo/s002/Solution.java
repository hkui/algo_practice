package algo.s002;

import algo.common.ListNode;

public class Solution {

    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        ListNode l=new ListNode();
        ListNode node=new ListNode();
        l.next=node;
        System.out.println(l.next);
        int fromPrev=0;
        do{
            int num=l1.val+l2.val+fromPrev;
            if(num>10){
                fromPrev=1;
            }else {
                fromPrev=0;
            }
            node.val=num%10;
            ListNode nextNode=new ListNode();
            node=nextNode;

            l1=l1.next;
            l2=l2.next;

        }while (l1!=null && l2!=null);


        return l;

    }

    public static void main(String[] args) {
        System.out.println(13%10);

//        Solution s=new Solution();
//
//        ListNode l1=new ListNode();
//        ListNode l2=new ListNode();
//        s.addTwoNumbers(l1,l2);
    }
}
