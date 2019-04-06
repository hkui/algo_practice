#include <stdio.h>
#include <string.h>
#include <stdlib.h>


typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;

void dump(strnode * head);


void * createSingleLink (char *str,int len){
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
	static strnode *ret[2];
	ret[0]=head;
	ret[1]=cur;
	return (void *) ret;
}
void dump(strnode * head){
	strnode *cur;
	cur=head->next;
	while(cur!=NULL){
		printf("%c\n", cur->c);
		cur=cur->next;
	}
}
int isPalindrome(strnode *head_end[2],int len){
	strnode *head=head_end[0];
	strnode *end=head_end[1];
	strnode *cur=head;
	while(cur!=end){
		if(cur->c!=end->c) return 0;
		cur=cur->next;
		// end=end->prev;
	}
	return 1;
}

int main(int argc, char const *argv[])
{
	char str[10]="";
	int len=0;
	scanf("%s",str);
	len=strlen(str);
	printf("str=%s,len=%d\n",str,len);
	strnode **ret;

	ret=(strnode **) createSingleLink(str,len);
	dump(ret[0]);


	return 0;
}