#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

typedef struct stu{
	char name[10];
	struct stu * next;
	struct stu *prev;
}stuNode;

//创建循环链表
stuNode * createStu(int n){
	stuNode * head,* cur,*node ,*prev;
	head=(stuNode *) malloc(sizeof(stuNode));
	cur=head;
	int i=0;
	printf("will create %d students\n",n );


	for(;i<n;i++){
		printf("please int %d name\n",i);
		node=(stuNode *) malloc(sizeof(stuNode));
		scanf("%s",&node->name);
		node->prev=cur;
		cur->next=node;
		cur=node;
	}
	// cur->next=NULL; //单链表
	cur->next=head; //循环链表
	return head;
}
//循环遍历链表
void * printStu(stuNode * node ){
	while(strlen(node->next->name)){
		printf("name=%s\n",node->next->name );
		node=node->next;
		sleep(1);
	}
}

int main(int argc, char const *argv[])
{
	stuNode * stu= createStu(3);
	printf("----------------------\n");
	printStu(stu);

	return 0;
}



