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
	struct Person *p=&p1;
	printf("p1=%p,p1.age=%d\n",p1 ,p1.age);
	printf("p=%p\n",p);

	


}
 