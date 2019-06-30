//楼梯问题

#include <stdio.h>
#include <stdlib.h>

//避免重复计算
int exist[100]={0};

int stack=0;
int f( int n){
    if (n<=1) return 1;
    if (n==2) return 2;
    if(exist[n]>0){
        return exist[n];
    }
    stack++;
    exist[n]=f(n-1)+f(n-2);
    return exist[n];
}
int main(){
    printf("f(%d)=%d\n",10,f(10));
    printf("stack=%d\n",stack);

    return 0;



}


