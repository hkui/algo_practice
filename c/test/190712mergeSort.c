#include <stdio.h>
#include <stdlib.h>

void merge(int arr[],int m,int n){
    int len=n-m+1;
    int i=m;
    int mid=(m+n)/2;
    int j=mid+1;
    int *tmparr=malloc(sizeof(int)*len);
    int index=0;
    while(i<=mid && j<=n){
        if(arr[i]<arr[j]){
            tmparr[index++]=arr[i++];
        } else if(arr[j]<arr[i]){
            tmparr[index++]=arr[j++];
        }else{
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
    int k=0;
    for(;k<index;k++){
        arr[m+k]=tmparr[k];
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
    mergeSort(arr,0,len-1);

    int i=0;

    for(;i<len;i++){
        printf("%d ",arr[i]);


    }
    printf("\n");
    return 0;
}




