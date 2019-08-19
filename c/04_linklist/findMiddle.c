/*
单链表反转
*/
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct stu{
	char name[10];
	struct stu * next;
}stuNode;

//创建链表
stuNode * createStu(int n){
	stuNode * head,* cur,*node;
	head=(stuNode *) malloc(sizeof(stuNode));
	strcpy(head->name,"head");
	cur=head;
	int i=0;
	printf("will create %d students\n",n );
	for(;i<n;i++){
		printf("please input %d name\n",i);
		node=(stuNode *) malloc(sizeof(stuNode));
		scanf("%s",&node->name);
		cur->next=node;
		cur=node;
	}
	cur->next=NULL; //单链表
	return head;
}
//循环遍历链表
void * printStu(stuNode * node ){
	while(node!=NULL){
		printf("%s\n",node->name );
		node=node->next;
	}
}
//快慢指针
stuNode * findMiddle(stuNode * head){
	stuNode *fast,*slow;
	fast=head->next;
	slow=fast;
	while(fast!=NULL&&fast->next!=NULL){
		fast=fast->next->next;
		slow=slow->next;
	}
	return slow;

}

int main(int argc, char const *argv[])
{
	stuNode *head=createStu(5);
	stuNode *mid=findMiddle(head);
	printf("mid->name=%s\n",mid->name);

}




