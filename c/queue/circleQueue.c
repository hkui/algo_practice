#include <stdio.h>
#include <stdlib.h>

//为了避免数据的搬移，使用环形数组队列
typedef struct {
    int size,used;
    int head,tail;
    int *array;
} circleQueue;

//创建1个size大小的队列
circleQueue * createQueueBySize(int size){
    circleQueue *queue=malloc(sizeof(circleQueue));
    queue->size=size;
    queue->used=0;
    queue->head=0;
    queue->tail=0;
    queue->array=(int *)malloc(size* sizeof(int));
    return queue;
}
int enqueue(circleQueue *queue,int val){
    //判断是不是满了
    if(queue->used ==queue->size) {
        return -1;
    }
    queue->array[queue->tail]=val;
    queue->tail=(queue->tail+1)%queue->size;
    queue->used++;
}
//出队
int dequeue(circleQueue *queue){
    if(queue->used==0){
        return -1;
    }
    int item=queue->array[queue->head];
    queue->head=(queue->head+1)%queue->size;
    queue->used--;
    return item;
}
void dump(circleQueue *queue){
    if(queue->used==0){
        return ;
    }
    printf("--DUMP-------\n");
    int i=0;
    int index=0;
    while (i<queue->used){
        index=(queue->head+i)%queue->size;
        printf("%d ",queue->array[index]);
        i++;
    }
    printf("\n");
}


int main(){
    circleQueue *queue=createQueueBySize(4);
    enqueue(queue,2);
    enqueue(queue,1);
    enqueue(queue,4);
    enqueue(queue,3);
    dump(queue);
    printf("%d \n",dequeue(queue));
    printf("%d \n",dequeue(queue));
    printf("%d \n",dequeue(queue));
    printf("%d \n",dequeue(queue));
    printf("%d \n",dequeue(queue));
    enqueue(queue,13);
    dump(queue);


    return 0;
}




