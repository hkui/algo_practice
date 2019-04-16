#include <stdio.h>

struct Person
{
	char name[20];
	int age;
	int sex;
	
};

int main(int argc, char const *argv[])
{
	struct Person p1={"hk",28,1};
	printf("p1=%x\n",p1);
	printf("p1.age=%d\n",p1.age);
	printf("p1=%x,p1.age=%d\n",p1,p1.age);

	struct Person *p=&p1;
	
	printf("p=%p\n",p);
	return 0;

	


}
 