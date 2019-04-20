#include <stdio.h>
#include <stdlib.h>
#include <string.h>


typedef struct _node{
	char name;
	struct _node *next;
}Node;


void * printNode(Node * node ){
    while(node!=NULL){
        printf("%c\n",node->name );
        node=node->next;
    }
}
//删除倒数第n个节点


/**
 * 只允许遍历一次，且n一直有效，可以利用双指针解法（前指针、后指针），让前指针先走n步，
 * 再让两个在指针同时后移，直到前指针到达尾部，此时，后指针的下一个节点就是要被删除的节点了
 * @param head
 * @param n
 */
void delReciprocalN(Node *head,int n){
    Node *cur=head->next;
    Node *p1,*p2;
    p1=cur;
    p2=cur;
    int i=0;
    while (i<=n){
        p1=p1->next;
        i++;
    }
    while(p1 && p2){
        p1=p1->next;
        p2=p2->next;
    }
    printf("------------\n");
    p2->next=p2->next->next;
    printNode(head);


}

int main(int argc, char const *argv[])
{
	Node head={'0',NULL};
	Node n1={'a',NULL};
	Node n2={'b',NULL};
	Node n3={'c',NULL};
	Node n4={'d',NULL};
	Node n5={'e',NULL};
	Node n6={'f',NULL};
	head.next=&n1;
	n1.next=&n2;
	n2.next=&n3;
	n3.next=&n4;
	n4.next=&n5;
	n5.next=&n6;

	printNode(&head);
	delReciprocalN(&head,2);





	return 0;
}








