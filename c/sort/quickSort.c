#include <stdio.h>

int partition(int arr[],int start,int end){
    int privot=arr[end];
    int i=start;
    int j=start;
    for(;j<end;j++){
        if(arr[i]<privot){
            i++;
        } else if(arr[i]>privot ){
            if(arr[j]<privot){
                int tmp=arr[j];
                arr[j]=arr[i];
                arr[i]=tmp;
                i++;
            }
        }
    }
    arr[end]=arr[i];
    arr[i]=privot;
    return i;
}
quickSort(int arr[],int startIndex,int endIndex){
    if(startIndex >=endIndex) return;
    int q=partition(arr,startIndex,endIndex);
    quickSort(arr,startIndex,q-1);
    quickSort(arr,q+1,endIndex);
}
int main(){

    int arr[]={3,1,2,0,9,7,-1,5,-10,100,99,8};
    int len=sizeof(arr)/ sizeof(int);
    quickSort(arr,0,len-1);
    int i;
    for(i=0;i<len;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");

    return 0;
}



