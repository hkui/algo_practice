//
// Created by hk on 2023-04-08.
//

#include "../utils.h"
void swapElement(int arr[],int a,int b){
    int tmp=arr[a];
    arr[a]=arr[b];
    arr[b]=tmp;
}
void bubbleSort(int arr[],int length){
    for(int j=0;j<length-1;j++){
        int swapNum=0;
        for(int i=0;i<length-1-j;i++){
            printf("j=%d,i=%d\n",j,i);
            if(arr[i]>arr[i+1]){
                swapElement(arr,i,i+1);
                swapNum++;
            }
        }
        if(swapNum==0){
            break;
        }
    }
}


int main(){
//    int arr[]={-2,1,9,5,6,3,4,7,2};
    int arr[]={1,2,3,4,5};
    PRINT_INT_ARR(arr);
    int length=sizeof(arr)/sizeof(arr[0]);

    bubbleSort(arr,length);
    PRINT_INT_ARR(arr);
}