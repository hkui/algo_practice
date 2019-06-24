#include <stdio.h>
#include <stdlib.h>

typedef struct {
    int size;
    int head,tail;
    int *array;
} arrayQueue;
//创建1个size大小的队列
arrayQueue * createQueueBySize(int size){
    arrayQueue *q=malloc(sizeof(arrayQueue));
    q->size=size;
    q->head=0;
    q->tail=0;
    q->array=(int *)malloc(size* sizeof(int));
    return q;
}
//入队
void enqueue(arrayQueue *q, int n){
    //如果tail已经到最右边，发现head左边有空间，把[head,tail)之间的数据整体向左边搬移head位
    if(q->tail ==q->size){
        if (q->head ==0 ) return ;//队列已经满了
        int j=q->head;
        for(;j<q->tail;j++){
            q->array[j-q->head]=q->array[j];
        }
        q->tail=q->tail-q->head;
        q->head=0;

    }
    q->array[q->tail]=n;
    q->tail++;

}
//出队
 int dequeue(arrayQueue *q){
    if (q->head==q->tail) return 0;
    int item=q->array[q->head];
    q->head++;
    return item;
}
void dump(arrayQueue *q){
    int i=0;
    for (i=q->head;i<q->tail;i++){
        printf("q[arr][%d]=%d\n",i,q->array[i]);
    }
    printf("#################################\n");
}
int main(){
    arrayQueue *q=createQueueBySize(4);
    enqueue(q,1);
    enqueue(q,3);
    enqueue(q,7);
    dump(q);
    printf("dequeue=%d\n",dequeue(q));
    enqueue(q,9);
    enqueue(q,11);
    dump(q);
}