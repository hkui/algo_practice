#ifndef COMMON_H
#define COMMON_H

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;

strnode * createSingleLink (char *str,int len);
void dump(strnode * head);
strnode * createSingleLink (char *str,int len);
int isPalindrome(strnode *head);


#endif