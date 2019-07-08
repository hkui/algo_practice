#include <stdio.h>
#include <stdlib.h>
//归并排序

void merge(int arr[],int m,int n){
    int *tmparr=malloc(sizeof(int) *(n-m+1));

    int mid=(m+n)/2;
    int i=m;
    int j=mid+1;
    int index=0;
    while(i<=mid && j<=n){
        if(arr[i]<arr[j]){
            tmparr[index]=arr[i];
            i++;
            index++;
        }else if(arr[i]>arr[j]){
            tmparr[index]=arr[j];
            j++;
            index++;
        } else {
            tmparr[index]=arr[i];
            index++;i++;
            tmparr[index]=arr[j];
            index++;j++;
        }
    }
    while(i<=mid){
        arr[index]=arr[i];
        index++;
        i++;
    }
    while(j<=n){
        arr[index]=arr[j];
        index++;
        j++;
    }
    for(i=0;i<=index;i++){
        arr[i+m]=tmparr[i];
    }

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
    int arr[]={4,2,5,1,6,3};

    int len= sizeof(arr)/ sizeof(int);
    mergeSort(arr,0,len-1);
    int i=0;
    for(;i<len;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");

    return 0;
}




