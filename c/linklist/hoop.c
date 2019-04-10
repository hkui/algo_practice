/**
1.设定两个指针slow、fast，从头指针开始，每次分别前进1步、2步。如存在环，则两者相遇；如不存在环，fast遇到NULL退出
2.记录下问题1的碰撞点p，slow、fast从该点开始，再次碰撞所走过的操作数就是环的长度s
3.碰撞点p到连接点的距离=头指针到连接点的距离，因此，分别从碰撞点、头指针开始走，相遇的那个点就是连接点
4.问题3中已经求出连接点距离头指针的长度，加上问题2中求出的环的长度，二者之和就是带环单链表的长度
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct node_{
	char name[10];
	struct  node_ *next;
}Node;

void isHoop(Node *head){
	Node *fast,*slow,*collision_point,*connect_point; //快慢指针，碰撞点，连接点
	fast=head;
	slow=head;
	int is_hoop=0;
	int hoop_len=0; //环的长度
	int no_hoop_len=0; //非环的长度
	while(fast && fast->next){
		fast=fast->next->next;
		slow=slow->next;
		if( slow==fast){
			is_hoop=1;
			collision_point=slow;
			printf("collision_point=%s\n",collision_point->name);
			break;
			
		}
	}
	//如果有环
	if(is_hoop==1){
		do{
			slow=slow->next;
			fast=fast->next->next;
			hoop_len++;

		}while(slow!=fast);
		printf("hoop_len=%d\n",hoop_len );

		//找连接点
		connect_point=head;
		do{
			no_hoop_len++;
			connect_point=connect_point->next;
			collision_point=collision_point->next;
		}while(collision_point!=connect_point);

		if(connect_point){
			printf("connect_point=%s\n",connect_point->name );
		}
		//总长度
		printf("sum len=%d\n",hoop_len+no_hoop_len);

	}
	
}

int main(int argc, char const *argv[])
{
	Node * head=malloc(sizeof(Node));
	strcpy(head->name,"head");
	Node *a=malloc(sizeof(Node));
	Node *b=malloc(sizeof(Node));
	Node *c=malloc(sizeof(Node));
	Node *d=malloc(sizeof(Node));
	strcpy(a->name,"a");
	strcpy(b->name,"b");
	strcpy(c->name,"c");
	strcpy(d->name,"d");
	head->next=a;
	a->next=b;
	b->next=c;
	c->next=d;
	d->next=b;
	isHoop(head);
	
	return 0;
}


