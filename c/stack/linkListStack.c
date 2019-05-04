#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

typedef struct _linkliststack{
	int data;
	struct _linkliststack *next;
}linkListStack;

//创建
linkListStack* linListStackCreate(){
	linkListStack *plinkListStack ;
	plinkListStack=malloc(sizeof(linkListStack));
	if(plinkListStack == NULL){
		return NULL;
	}
	plinkListStack->next=NULL;
	plinkListStack->data=-1;
	return plinkListStack;
}
int linListStackPush(linkListStack *plinkListStack,int data){
	linkListStack *node=malloc(sizeof(linkListStack));
	if(node==NULL){
		return -1;
	}

	node->data=data;
	node->next=plinkListStack->next;
	plinkListStack->next=node;
	return 0;

}

linkListStack *linkListStackPop(linkListStack *plinkListStack){
	linkListStack *node;
	if(plinkListStack->next!=NULL){
			node=plinkListStack->next;
			plinkListStack->next=node->next;

			return node;
	}
	return NULL;
}

void linListStackDump(linkListStack *plinkListStack){
	if(plinkListStack==NULL) return;
	linkListStack *ptmp=plinkListStack->next;

	while(ptmp!=NULL){
		printf("%d\n",ptmp->data );
		ptmp=ptmp->next;
	}
}

void linkListStackDestory(linkListStack *plinkListStack){
	linkListStack *ptmp=NULL;
	while(plinkListStack->next!=NULL){
		ptmp=plinkListStack->next;
		plinkListStack->next=plinkListStack->next->next;
		free(ptmp);
	}
	free(plinkListStack);
}

int main(int argc, char const *argv[])
{
	linkListStack *plinkListStack=linListStackCreate();
	linListStackPush(plinkListStack,2);
	linListStackPush(plinkListStack,5);
	linListStackPush(plinkListStack,1);

	linListStackPush(plinkListStack,3);
	linListStackDump(plinkListStack);

	linkListStackDestory(plinkListStack);
	printf("----------------------------\n");


	linListStackDump(plinkListStack);




	/*linkListStack *node=NULL;
	while(plinkListStack->next){
			node=linkListStackPop(plinkListStack);
			printf("pop=%d\n",node->data );

	}
	linListStackDump(plinkListStack);*/

	

	




	return 0;
}








