/*

单链表实现lru
越靠近链表尾部的节点是越早之前访问的
当有一个新的数据被访问时，从链表头开始顺序遍历链表
  1.如果此数据之前已经被缓存在链表中，遍历得到这个数据对应的节点，并将其从原来的位置删除，然后再插入到链表的头部
  2.没在缓存链表里
    2.1 缓存未满，将次节点直接插入到链表的头部
    2.2 已经满了，删除链表尾部节点，将新的数据节点插入到链表的头部
*/


#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <strings.h>

#define LEN 10

typedef struct stu {
    int no;
    struct stu *next;
} stuNode;


//空间记录
typedef struct {
    int size;
    int used;
} log;

//插入创建有序的链表
int insert(stuNode *head, int no, log *llog) {
    if (llog->used >= llog->size) {
        printf("no=%d  -------------fulled \n", no);
        return -1;
    }
    stuNode *prev, *cur;
    cur = head;
    //查找第一个比no大的节点，在这个节点之前插入
    while (cur != NULL) {
        if (no < cur->no) {
            break;
        }
        prev = cur;
        cur = cur->next;
    }
    stuNode *newNode = malloc(sizeof(stuNode));
    newNode->no = no;

    llog->used += sizeof(stuNode);
    prev->next = newNode;
    newNode->next = cur;
    
}


//循环遍历链表 字符串格式输出，方便观看
void varDump(stuNode *node) {
    char str[100]={0};
    char *strno;
    while (node->next != NULL) {
        bzero(strno,sizeof(strno));
        sprintf(strno,"%d ",node->next->no);
        strcat(str,strno);
        node = node->next;
    }
    printf("%s\n", str);
}

/*
1.如果此数据之前已经被缓存在链表中，遍历得到这个数据对应的节点，并将其从原来的位置删除，然后再插入到链表的头部
2.没在缓存链表里
   2.1 缓存未满，将次节点直接插入到链表的头部
   2.2 已经满了，删除链表尾部节点，将新的数据节点插入到链表的头部
 */


void lru(stuNode *head, int no,log *llog) {
    stuNode *prev, *cur;
    cur = head;
    int flag_delete_insert = 0;

    while (cur != NULL) {
        if (no == cur->no) {
            flag_delete_insert = 1;
            break;
        }
        prev = cur;
        cur = cur->next;
    }
    stuNode *newNode = malloc(sizeof(stuNode));
    newNode->no = no;
    //删除老节点，把新的插入到表头
    if (flag_delete_insert == 1) {
        prev->next = cur->next;
        newNode->next = head->next;
        head->next = newNode;
    } else {
        //没在链表里，分2种情况
        //1.缓存已经满了，删除尾部节点，将新的插入到链表的头部
        if (llog->used >= llog->size) {
            printf("no=%d  -------------fulled \n", no);
            free(prev->next);
        }else{
            //2/缓存未满，新节点插入到链表的头部
            newNode->next=head->next;
            head->next=newNode;
            llog->used += sizeof(stuNode);
        }
        
    }
}

int main(int argc, char const *argv[]) {
    //链表大小信息
    log llog = {sizeof(stuNode) * LEN, 0};
    printf("all_size=%d\n", sizeof(stuNode) * LEN);
    stuNode head = {0, NULL};
    int no;
    int i;
    printf("please input %d num\n",LEN-2 );
    for(i=0;i<LEN-2;i++){
        scanf("%d",&no);
        insert(&head, no, &llog);
    }
    printf("dump---------------\n");

    varDump(&head);
    printf("---------lru----------\n");
    int getno;
    for(i=0;i<5;i++){
        printf("please input a num for lru\n");
        scanf("%d",&getno);
        lru(&head,getno,&llog);
        printf("--------dump---------------\n");
        varDump(&head);
    }
    return 0;
}












