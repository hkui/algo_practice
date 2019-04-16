#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct node_{
	int no;
	struct  node_ *next;
}Node;

void mergeOrderList(Node *head1,Node *head2){
	

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




	
	

	return 0;
}




