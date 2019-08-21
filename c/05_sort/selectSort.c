//选择排序
#include <stdio.h>
void selectSort(int arr[],int size){
    int i,j;
    for(i=0;i<size;i++){
        int minIndex=i;
        for(j=i+1;j<size;j++){
            if(arr[j]<arr[minIndex]){
                minIndex=j;
            }
        }
        if(minIndex!=i){
            int tmp=arr[minIndex];
            arr[minIndex]=arr[i];
            arr[i]=tmp;
        }
    }
}

int main(){
    int arr[5]={3,2,1,5,7};
    selectSort(arr,5);
    int i=0;
    for(;i<5;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");
    return 0;
}
