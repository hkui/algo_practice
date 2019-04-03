#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct str_node{
	char c;
	struct str_node *next;

} strnode;

int isPalindrome(char * str,int len){
	int i=0;
	strnode *head,*cur;
	head=malloc(sizeof(strnode));
	cur=head;

	for(;i<len;i++){
		strnode * node=malloc(sizeof(strnode));
		cur->next=node;
	}


	return 0;

}
void dump(strnode * head){
	strnode *cur;
	cur=head->next;
	while(cur!=NULL){
		printf("%c\n", cur->c);
		cur=cur->next;

	}
}

int main(int argc, char const *argv[])
{
	char str[10]="";
	int len=0;

	scanf("%s",str);
	len=strlen(str);
	
	printf("str=%s,len=%d\n",str,len);

	return 0;
}