package algo.common;

import java.util.Arrays;

public class ListNode {
    public int val;
    public ListNode next;

    public ListNode() {}

    ListNode(int val) {
        this.val = val;
    }
    ListNode(int val, ListNode next) {
        this.val = val;
        this.next = next;
    }
    public static ListNode createNode(int ...args){
        ListNode l=new ListNode();
        ListNode cur=new ListNode();
        l.next=cur;
        for (int val:args){
            cur.val=val;
            ListNode node=new ListNode();
            cur.next=node;
            cur=node;
        }
        return  l;
    }

    public static void main(String[] args) {
        ListNode l=createNode(4,2,3);
        while (l!=null){
            System.out.println(l.val);
            l=l.next;
        }
    }
}
