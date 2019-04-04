#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "link_common.h"

typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;






int isPalindrome(strnode *head){
	strnode *slow,*quick,*prev,*next;
	slow=head->next;
	quick=head->next;
	prev=head;

	while(quick!=NULL && quick->next!=NULL){
		quick=quick->next->next; //写在上面，避免第一个受到下面逆序的影响
		next=slow->next;
		slow->next=prev;
		prev=slow;
		slow=next;	
	}
	//奇数个
	if(quick !=NULL){

		//比如 abcba slow在 c,prev在第1个b
		strnode *right_begin=slow->next; //舍弃中间元素，从它下一个开始比较
		strnode *left_begin=prev;

		while(right_begin!=NULL){
			if(left_begin->c!=right_begin->c){
				return 0;
			}
			left_begin=left_begin->next;
			right_begin=right_begin->next;
		}


	}
	//偶数个的 比如abccba,此时prev在第1个c,slow在第二个c
	else{
		strnode *left_begin=prev;
		strnode *right_begin=slow;
		while(right_begin!=NULL){
			if(right_begin->c!=left_begin->c){
				return 0;
			} 
			left_begin=left_begin->next;
			right_begin=right_begin->next;
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
	//printf("str=%s,len=%d\n",str,len);
	strnode *head=createSingleLink(str,len);
	int isPalind=isPalindrome(head);
	printf("%s isPalind=%d\n",str,isPalind );
	return 0;
}