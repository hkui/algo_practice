#include <stdio.h>

struct Person
{
	
	int sex;
	int age;
	
	char name[20];
	
};

int main(int argc, char const *argv[])
{
	struct Person p1={1,28,"hk"};
	//错误操作
	printf("p1=%x\n",p1);
	printf("p1.age=%d\n",p1.age);
	printf("p1=%x,p1.age=%d\n",p1,p1.age);
	return 0;


}
 