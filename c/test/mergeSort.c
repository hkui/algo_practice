#include <stdio.h>
#include <stdlib.h>
#include "../utils.h"

void merge(int arr[],int m,int n){
    int len=n-m+1;
    int *tmparr=malloc(sizeof(int) *len);

    int mid=(m+n)/2;
    int i=m;
    int j=mid+1;
    int index=0;
    while(i<=mid && j<=n){
        if(arr[i]<arr[j]){
            tmparr[index++]=arr[i++];
        }else if(arr[i]>arr[j]){
            tmparr[index++]=arr[j++];
        } else {
            tmparr[index++]=arr[i++];
            tmparr[index++]=arr[j++];
        }
    }

    while(i<=mid){
        tmparr[index++]=arr[i++];
    }
    while(j<=n){
        tmparr[index++]=arr[j++];
    }
    int k;
    for(k=0;k<index;k++){
        arr[k+m]=tmparr[k];
    }
    free(tmparr);
}

void mergeSort(int arr[],int m,int n){
    if(m>=n){
        return;
    }
    int mid=(m+n)/2;
    mergeSort(arr,m,mid);
    mergeSort(arr,mid+1,n);
    merge(arr,m,n);
}



int main(){
    int arr[]={3,1,2,0,9,7,-1,5,-10,100,99,8};
    int len= sizeof(arr)/ sizeof(int);
    PRINT_INT_ARR(arr);
    mergeSort(arr,0,len-1);
    PRINT_INT_ARR(arr);

    return 0;
}




