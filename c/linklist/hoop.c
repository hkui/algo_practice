#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct node_{
	char name[10];
	struct  node_ *next;
}Node;

int isHoop(Node *head){
	Node *fast,*slow;
	fast=head->next;
	slow=head->next;
	while(fast && fast->next){
		fast=fast->next->next;
		
		slow=slow->next;

		
		if( slow==fast){
			printf("slow->name=%s\n",slow->name);
			return 1;
		}
	}
	return 0;
}

int main(int argc, char const *argv[])
{
	Node * head=malloc(sizeof(Node));
	strcpy(head->name,"head");
	Node *a=malloc(sizeof(Node));
	Node *b=malloc(sizeof(Node));
	Node *c=malloc(sizeof(Node));
	Node *d=malloc(sizeof(Node));
	strcpy(a->name,"a");
	strcpy(b->name,"b");
	strcpy(c->name,"c");
	strcpy(d->name,"d");
	head->next=a;
	a->next=b;
	b->next=c;
	c->next=d;
	d->next=a;
	int is_hoop=isHoop(head);
	printf("is_hoop=%d\n",is_hoop );


	
	





	
	return 0;
}


