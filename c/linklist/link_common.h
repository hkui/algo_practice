#ifndef COMMON_H
typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
void dump(strnode * head);
strnode * createSingleLink (char *str,int len);


#define COMMON_H
#endif