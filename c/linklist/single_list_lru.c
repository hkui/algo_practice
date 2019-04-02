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

//插入(并维持链表有序)
int insert(stuNode *head, int no, log *llog) {
    stuNode *prev, *cur;
    cur = head;
    int flag_delete_insert = 0;

    while (cur != NULL) {
        if (no < cur->no) {
            break;
        } else if (no == cur->no) {
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
        if (llog->used >= llog->size) {
            printf("no=%d  -------------fulled \n", no);
            free(newNode);
            return -1;
        }
        llog->used += sizeof(stuNode);
        prev->next = newNode;
        newNode->next = cur;
    }
}


//循环遍历链表
void *varDump(stuNode *node) {
    while (node->next != NULL) {
        printf("%d\n", node->next->no);
        node = node->next;
    }
}
//删除第n个节点
void *delStu(stuNode *node, int n) {
    int i = 0;
    stuNode *beforeNode;
    for (; i < n; node != NULL) {
        beforeNode = node;
        node = node->next;
        i++;
    }
    if (node != NULL) {
        if (node->next != NULL) {
            beforeNode->next = node->next;
        }
        free(node);
    } else {
        puts("节点不存在");
    }
}

/*
1.如果此数据之前已经被缓存在链表中，遍历得到这个数据对应的节点，并将其从原来的位置删除，然后再插入到链表的头部
2.没在缓存链表里
   2.1 缓存未满，将次节点直接插入到链表的头部
   2.2 已经满了，删除链表尾部节点，将新的数据节点插入到链表的头部
 */


int lru(stuNode *head, int no,log *llog) {
    stuNode *prev, *cur;
    cur = head;
    int flag_delete_insert = 0;

    while (cur != NULL) {
        if (no < cur->no) {
            break;
        } else if (no == cur->no) {
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
        if (llog->used >= llog->size) {
            printf("no=%d  -------------fulled \n", no);
            free(newNode);
            return -1;
        }
        //未满，把
        llog->used += sizeof(stuNode);
        prev->next = newNode;
        newNode->next = cur;
    }
}

int main(int argc, char const *argv[]) {
    //链表大小信息
    log llog = {sizeof(stuNode) * LEN, 0};
    printf("all_size=%d\n", sizeof(stuNode) * LEN);
    stuNode head = {0, NULL};

    insert(&head, 5, &llog);
    insert(&head, 4, &llog);
    insert(&head, 3, &llog);
    insert(&head, 1, &llog);
    insert(&head, 2, &llog);
    insert(&head, 9, &llog);
    insert(&head, 10, &llog);
    insert(&head, 8, &llog);
    insert(&head, 6, &llog);
    insert(&head, 3, &llog);
    varDump(&head);

    //以上是生成有序链表

    //下面访问有序链表










    return 0;
}












