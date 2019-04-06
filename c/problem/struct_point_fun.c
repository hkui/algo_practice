#include <stdio.h>

typedef struct node_template{
		int no;
		struct node_template *next;

	} node,*pnode;

void * change(pnode pn,int no){
	pn->no=no;

}
int main(int argc, char const *argv[])
{
	//结构体
	struct student{
		char name [10];
		int no;
	} ;
	//stu_template 可省略
	typedef struct stu_template{
		char name[10];
		int no;
	} stu;

	//结构体变量
	struct student stu1={"hkui",1};
	//student st1; //错误写法
	
	stu stu2={"boy",2};
	struct  stu_template stu3={"tom",22};

	

	node node1={1,NULL};
	struct node_template node2={2,NULL};

	pnode pnode1=&node1;
	printf("pnode1->no=%d\n",pnode1->no);
	change(pnode1,22);
	printf("pnode1->no=%d\n",pnode1->no);
	
	return 0;
}


