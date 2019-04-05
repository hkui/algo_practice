#include "palindrome_str.h"

//判断是否是回文
/*
使用快慢两个指针找到链表中点，慢指针每次前进一步，快指针每次前进两步。
在慢指针前进的过程中，同时修改其 next 指针，使得链表前半部分反序。
最后比较中点两侧的链表是否相等
*/
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
void dump(strnode * head){
	strnode *cur;
	cur=head->next;
	while(cur!=NULL){
		cur=cur->next;
	}
}
//根据字符串创建单链表
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