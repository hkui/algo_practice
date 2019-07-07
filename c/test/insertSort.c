#include <stdio.h>
insertSort(int arr[],int size){
    int i,j;

    for(i=1;i<size;i++){
        int tmp=arr[i];
        for (j=i-1;j>=0;j--){
            if(arr[j]>tmp){
                arr[j+1]=arr[j];
            } else{
                break;
            }
        }
        arr[j+1]=tmp;
    }
}

int main(){
    int arr[]={2,7,3,1,5,4,6,0};
    int len= sizeof(arr)/ sizeof(int);

    insertSort(arr,len);
    int i=0;
    for(;i<len;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");
}

