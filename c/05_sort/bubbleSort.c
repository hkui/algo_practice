//冒泡排序
#include <stdio.h>
//这个算啥排序啊
/*void bubbleSort1(int *arr,int size){
    if (size <=1) return;
    int i=0;
    int j=0;
    for(;i<size-1;i++){
        for(j=i+1;j<size;j++){
            if(arr[i]>arr[j]){
                int tmp=arr[i];
                arr[i]=arr[j];
                arr[j]=tmp;
            }
        }
    }
}*/

void bubbleSort(int *arr,int size){
    if (size <=1) return;
    int i,j;

    for(i=0;i<size;i++){
        int flag=0;
        for(j=0;j<size-i-1;j++){
            if(arr[j]>arr[j+1]){
                int  tmp=arr[j];
                arr[j]=arr[j+1];
                arr[j+1]=tmp;
                flag=1;
            }
        }
        if(flag==0) break;
    }

}
int main(){
    int a[]={5,1,6,2,3,4,0,9,13,10,7,9};
    bubbleSort(a,12);
    int i=0;
    for(;i<12;i++){
        printf("%d ",a[i]);
    }
    printf("\n ");
    return 0;

}

