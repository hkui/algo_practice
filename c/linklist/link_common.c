#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;

void dump(strnode * head){
	strnode *cur;
	cur=head->next;
	while(cur!=NULL){
		cur=cur->next;
	}
}
strnode * createSingleLink (char *str,int len){
	int i=0;
	strnode *head,*cur;
	head=malloc(sizeof(strnode));
	cur=head;
	for(;i<len;i++){
		strnode * node=malloc(sizeof(strnode));
		node->c=str[i];
		cur->next=node;
		cur=cur->next;
	}
	return head;
	
}