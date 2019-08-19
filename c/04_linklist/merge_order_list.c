#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct node_{
	int no;
	struct  node_ *next;
}Node;

Node * mergeOrderList(Node *head1,Node *head2,Node *Head){
	Node *cur1=head1->next;
	Node *cur2=head2->next;
	Node *cur=Head;
	while(cur1 && cur2){
		if(cur1->no<cur2->no){
			cur->next=cur1;
			cur1=cur1->next;
			cur=cur->next;
		}else{
			cur->next=cur2;
			cur2=cur2->next;
			cur=cur->next;
		}
	}
	
	while(cur1){
		cur->next=cur1;
		cur1=cur1->next;
		cur=cur->next;
	}
	while(cur2){
		cur->next=cur2;
		cur2=cur2->next;
		cur=cur->next;
	}

	return Head;
}
//循环遍历链表
void * printNode(Node * node ){
	while(node->next!=NULL){
		node=node->next;
		printf("%d\n",node->no );
		
	}
}

int main(int argc, char const *argv[])
{
	Node head1={0,NULL};
	Node n1={1,NULL};
	Node n2={3,NULL};
	Node n3={5,NULL};
	Node n4={7,NULL};
	head1.next=&n1;
	n1.next=&n2;
	n2.next=&n3;
	n3.next=&n4;

	Node head2={0,NULL};

	Node n5={4,NULL};
	Node n6={6,NULL};
	Node n7={9,NULL};
	head2.next=&n5;
	n5.next=&n6;
	n6.next=&n7;

	Node head_name={0,NULL};
	Node *Head=&head_name;

	//Node *Head={0,NULL};
	
	mergeOrderList(&head1,&head2,Head);
	printNode(Head);




	
	

	return 0;
}




