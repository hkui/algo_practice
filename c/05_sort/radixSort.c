#include <stdio.h>
#include <stdlib.h>
//https://www.cnblogs.com/compulsive/archive/2011/09/22/2185079.html
int get_index(int num, int dec, int order)
{
    int i, j, n;
    int index;
    int div;



    /* 根据位数，循环减去不需要的高位数字 */
    for (i=dec; i>order; i--) {
         n = 1;
        for (j=0; j<dec-1; j++){
             n *= 10;
        }
        printf("n=%d\n",n);
        div = num/n;
        num -= div * n;
        dec--;
    }
    printf("num=%d\n",num);

    /* 获得对应位数的整数 */
    n = 1;
    for (i=0; i<order-1; i++)
        n *= 10;

    /* 获取index */
    index = num / n;

    return index;
}

radixSort(int arr[],int size){

}

int main(){

//    printf("%d\n",get_index(6213,4,3));
    printf("%d\n",get_index(6213,4,2));
//    printf("%d\n",get_index(621356,6,5));
    return 0;
}


