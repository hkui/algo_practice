#include "../utils.h"
/**
 *
 * @param arr
 * @return
 *
 */
int partition(int arr[],int p,int r){
    int privot=arr[r];//分区点
    int i,j; //arr[p,i-1]为已处理区间
    i=p,j=p;
    for(;j<r-1;j++){
        if(arr[j]<privot){
            int tmp=arr[i];
            arr[i]=arr[j];
            arr[j]=tmp;
            i++;
        }
    }
    arr[r]=arr[i];
    arr[i]=privot;
    return i;
}
void quickSort(int arr[],int p,int r){
    if (p>=r){
        return;
    }
    int partIndex=partition(arr,p,r);
    quickSort(arr,p,partIndex-1);
    quickSort(arr,partIndex+1,r);
}
int  main(){
    int arr[]={4,2,5,1,6,3};
    PRINT_INT_ARR(arr);
    int len= sizeof(arr)/ sizeof(int);
    quickSort(arr,0,len-1);
    PRINT_INT_ARR(arr);
    return 0;
}

