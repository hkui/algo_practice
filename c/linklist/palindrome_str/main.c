
#include "palindrome_str.h"

int main(int argc, char const *argv[])
{
	char str[10]="";
	int len=0;
	scanf("%s",str);
	len=strlen(str);
	strnode *head=createSingleLink(str,len);
	int isPalind=isPalindrome(head);
	printf("%s isPalind=%d\n",str,isPalind );
	return 0;
}
// gcc main.c palindrome_str.c
