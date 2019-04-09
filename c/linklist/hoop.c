#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct node_{
	char name[10];
	struct  node_ *next;
}Node;

int main(int argc, char const *argv[])
{
	Node * head=malloc(sizeof(Node));
	strcpy(head->name,"head");


	
	return 0;
}


