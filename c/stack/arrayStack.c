#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct _array_stack
{
	int size;
	int pos;
	int *array;
}stArrayStack;

#define stArrayStackIsFull(stack) (stack->size-1==stack->pos)
#define stArrayStackIsEmpty(stack)(stack->pos==-1)
#define stArrayStackSize(stack)(stack->size)


//创建指定大小的顺序栈
stArrayStack *createArrayStack(int size){
	stArrayStack * pstArrayStack=NULL;

	pstArrayStack=malloc(sizeof(pstArrayStack));
	if(pstArrayStack ==NULL){
		return NULL;
	}

	pstArrayStack->size=size;
	pstArrayStack->pos=-1;

	pstArrayStack->array=malloc(size*sizeof(int));
	if(pstArrayStack->array==NULL){
		free(pstArrayStack);
		return NULL;
	}
	return pstArrayStack;
}
//入栈
int arrayStackPush(stArrayStack *pstArrayStack,int data){
	if(stArrayStackIsFull(pstArrayStack)){
		return -1;
	}
	pstArrayStack->pos++;
	pstArrayStack->array[pstArrayStack->pos]=data;
	return 0;
}
//出栈
int arrayStackPop(stArrayStack *pstArrayStack){
	if(stArrayStackIsEmpty(pstArrayStack)){
		return -1;
	}
	
	int data=pstArrayStack->array[pstArrayStack->pos];
	pstArrayStack->pos--;
	return data;
}
//销毁顺序栈
void arrayStackDestory(stArrayStack *pstArrayStack){
	if(pstArrayStack ==NULL){
		return;
	}
	if(pstArrayStack->array!=NULL){
		free(pstArrayStack->array);
	}
	free(pstArrayStack);
	return;
}
void arrayStackDump(stArrayStack *pstArrayStack){
	if(stArrayStackIsEmpty(pstArrayStack)){
		return;
	}
	for(int i=0;i<=pstArrayStack->pos;i++){
		printf("pstArrayStack->array[%d]=%d\n",i,pstArrayStack->array[i] );
	}
}

int arrayStackNew(stArrayStack *pstArrayStack,int data){
	int *intnew=NULL;
	if(!stArrayStackIsFull(pstArrayStack)){
		return arrayStackPush(pstArrayStack,data);
	}
	intnew=malloc(2*pstArrayStack->size*sizeof(int));

	if(intnew==NULL){
		return -1;
	}
	memcpy(intnew,pstArrayStack->array,sizeof(int) *pstArrayStack->size);
	free(pstArrayStack->array);
	pstArrayStack->array=intnew;
	pstArrayStack->size=2*pstArrayStack->size;
	pstArrayStack->pos++;
	pstArrayStack->array[pstArrayStack->pos]=data;
	return 0;




}

int main(int argc, char const *argv[])
{
	stArrayStack *pstArrayStack=createArrayStack(5);
	arrayStackPush(pstArrayStack,2);
	arrayStackPush(pstArrayStack,1);
	arrayStackPush(pstArrayStack,3);
	arrayStackPush(pstArrayStack,5);

	arrayStackNew(pstArrayStack,15);
	arrayStackNew(pstArrayStack,6);
	arrayStackNew(pstArrayStack,8);
	arrayStackNew(pstArrayStack,9);
	arrayStackNew(pstArrayStack,10);

	arrayStackDump(pstArrayStack);
	// arrayStackPush(pstArrayStack,2);
	// arrayStackPush(pstArrayStack,2);

	return 0;
}

