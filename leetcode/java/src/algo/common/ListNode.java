package algo.common;

import java.util.Arrays;

public class ListNode {
    public int val;
    public ListNode next;

    public ListNode() {}

    public ListNode(int val) {
        this.val = val;
    }
    ListNode(int val, ListNode next) {
        this.val = val;
        this.next = next;
    }
    public static ListNode createNode(int ...args){
        ListNode l=new ListNode();
        ListNode cur=l;
        for (int val:args){
            ListNode node=new ListNode(val);
            cur.next=node;
            cur=node;
        }
        return  l.next;
    }
    public static void printListNode(ListNode l){
        while (l!=null){
            System.out.println(l.val);
            l=l.next;
        }
    }

    public static void main(String[] args) {
        ListNode l=createNode(4,2,3);
        while (l!=null){
            System.out.println(l.val);
            l=l.next;
        }
    }
}