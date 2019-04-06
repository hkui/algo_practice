#include <stdio.h>
#include <string.h>
#include <stdlib.h>
typedef struct str_node{
	char c;
	struct str_node *next;
} strnode;

int main(int argc, char const *argv[])
{
	
	strnode *anode,*bnode;
	anode=malloc(sizeof(strnode));
	bnode=malloc(sizeof(strnode));
	anode->c='a';
	bnode->c='b';
	int a=1;
	//作用域问题,声明不能在{}里
	if(a==1){
		strnode *node=anode;
	}else{
		strnode *node=bnode;
	}
	printf("node->c=%c\n",node->c);
	return 0;
}