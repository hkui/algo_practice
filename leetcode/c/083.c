#include <stdlib.h>
#include <stdarg.h>
#include <stdio.h>

struct ListNode {
    int val;
    struct ListNode *next;
};

//创建单链表
struct ListNode *createSingleListNode(int count, ...) {
    struct ListNode *head, *node, *cur;
    va_list nums;
    va_start(nums, count);

    head = (struct ListNode *) malloc(sizeof(struct ListNode));
    cur = head;
    for (int i = 0; i < count; i++) {
        node = (struct ListNode *) malloc(sizeof(struct ListNode));
        cur->val = va_arg(nums, int);
        if (i == count - 1) {
            break;
        }
        cur->next = node;
        cur = node;
    }
    va_end(nums);
    return head;
}

void printNode(struct ListNode *head) {
    while (head != NULL) {
        printf("%d\n", head->val);
        head = head->next;
    }
}

struct ListNode *deleteDuplicates(struct ListNode *head) {
    struct ListNode *cur, *next;
    cur = head;
    while (cur != NULL) {
        next = cur->next;
        while (next != NULL && cur->val == next->val) {
            next = next->next;
        }
        cur->next = next;
        cur = cur->next;
    }
    return head;
}

int main() {
    struct ListNode *head, *newHead;

    head = createSingleListNode(5, 1, 2, 2, 3,3);
    printNode(head);
    printf("------------\n");
    newHead = deleteDuplicates(head);
    printNode(newHead);
    return 0;
}
//make 083
// ./083



