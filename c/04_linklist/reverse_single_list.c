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
stuNode * reverse_list(stuNode *head){
	stuNode *cur=head->next;
	head->next=NULL;
	stuNode *prev=head;
	while(cur!=NULL){
		stuNode *next=cur->next;
		cur->next=prev;
		prev=cur;
		cur=next;
	}
	return prev;
}

int main(int argc, char const *argv[])
{
	stuNode *head=createStu(5);
	printf("------------------------------------------\n");
	printStu(head);
	printf("------------------------------------------\n");
	printStu(reverse_list(head));
	return 0;
}




