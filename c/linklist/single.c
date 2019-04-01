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
void * changeStu(stuNode *node,int n){
	int i=0;
	for(;i<n;node!=NULL){
		node=node->next;
		i++;
	}
	if(node!=NULL){
		puts("输入要修改的值");
		scanf("%s", &node->name);
	}else{
		puts("节点不存在");
	}
}
//循环遍历链表
void * printStu(stuNode * node ){
	while(node->next!=NULL){
		node=node->next;
		printf("%s\n",node->name );
		
	}
}
//删除节点

void *delStu(stuNode *node,int n){
	int i=0;
	stuNode *beforeNode;
	for(;i<n;node!=NULL){
		beforeNode=node;
		node=node->next;
		i++;
	}
	if(node!=NULL){
		if(node->next!=NULL){
			beforeNode->next=node->next;
		}
		free(node);
	}else{
		puts("节点不存在");
	}
}
int findStu(stuNode *node,char name[]){
	int i=0;
	while(node!=NULL){
		if(strcmp(node->name,name)==0){
			return i;
		}
		node=node->next;
		i++;
	}
	return -1;
}


int main(int argc, char const *argv[])
{
	stuNode * stu= createStu(5);
	printf("---------打印-------------\n");
	//printStu(stu);
	changeStu(stu,2);
	printf("---------修改第2个后的值-------------\n");
	printStu(stu);
	return 0;
	delStu(stu,3);
	printf("---------删除第3个后的值-------------\n");
	printStu(stu);

	int index=findStu(stu,"hkui");
	printf("hkui的位置为index=%d\n",index );

	return 0;
}