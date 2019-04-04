#include <stdio.h>
#include <string.h>
#include <stdlib.h>


typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;

void dump(strnode * head);


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
void dump(strnode * head){
	strnode *cur;
	cur=head->next;
	while(cur!=NULL){
		printf("%c\n", cur->c);
		cur=cur->next;
	}
}
int isPalindrome(strnode *head){
	strnode *slow,*quick,*prev,*next;
	
	slow=head->next;
	
	quick=head->next;

	prev=head;


	while(quick!=NULL && quick->next!=NULL){
		
		next=slow->next;
		slow->next=prev;
		prev=slow;
		slow=next;

		quick=quick->next->next;
			
	}
	//奇数个
	if(quick !=NULL){

		//比如 abcba slow在 
		strnode *left_begin=prev->next; //舍弃中间元素，从它下一个开始比较

		while(slow!=NULL){
			if(slow->c!=left_begin->c){
				return 0;
			}
			slow=slow->next;
			left_begin=left_begin->next;
		}


	}
	//偶数个的 比如abccba,此时prev在第二个c,slow在第二个b
	else{
		strnode *left_begin=prev->next->next;
		if(slow!=NULL){
			if(slow->c!=left_begin->c) return 0;
			left_begin=left_begin->next;
			slow=slow->next;
		}
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
	strnode *head=createSingleLink(str,len);
	dump(head);
	int isPalind=isPalindrome(head);
	printf("isPalind=%d\n",isPalind );


	return 0;
}