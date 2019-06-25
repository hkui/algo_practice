#include <stdio.h>
#include <stdlib.h>

//基于链表的队列实现

//每一个节点的结构
typedef struct _ListQueueNode{
    int data;
    struct _ListQueueNode *next;
}queueNode;

//队列的结构
typedef struct {
    queueNode *tail;
    queueNode *head;
    int num;  //队列的长度
} listQueue;

//创建队列头
listQueue *createListQueue(){
    listQueue *q=NULL;
    q=malloc(sizeof(listQueue));
    if(q==NULL){
        return NULL;
    }
    q->num=0;
    q->head=NULL;
    q->tail=NULL;
    return q;
}

//入列
int listQueueEnqueue(listQueue *q,int data){
    queueNode *qnode=malloc(sizeof(queueNode));
    if(qnode==NULL){
        return -1;
    }
    qnode->data=data;
    qnode->next=NULL;
    //第一次入队
    if(q->head==NULL){
        q->head=qnode;
    }else{
        q->tail->next=qnode; //连接之前的node 与新插入的节点的关系
    }
    q->tail=qnode;
    q->num++;
    return 0;
}
//出队列
int listQueueDequeue(listQueue *q){
    if (q->num == 0) return -1;

    int item=q->head->data;
    q->head=q->head->next;
    q->num=q->num-1;
    return item;
}
void listQueueDump(listQueue *q){
    if (q->num ==0) return;
    while(q->head!=NULL){
        printf("%d\n",q->head->data);
        q->head=q->head->next;

    }
}


int main(){
    listQueue *q=createListQueue();
    listQueueEnqueue(q,1);
    listQueueEnqueue(q,3);
    listQueueEnqueue(q,7);
    listQueueEnqueue(q,5);
    listQueueEnqueue(q,4);
    listQueueDump(q);

    printf("%d\n",listQueueDequeue(q));
    return 0;

}





