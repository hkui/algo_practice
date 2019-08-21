#include <stdio.h>

//插入排序

void insertSort(int  arr[],int size){
    int i,j;

    for(i=1;i<size;i++){
        int value=arr[i];//把i位置挖出来空着
        //下面需要在[0,i]中找位置把value插进去
        for(j=i-1;j>=0;j--){
            if(arr[j]>value){
                arr[j+1]=arr[j];
            }else{
                break;
            }
        }
        arr[j+1]=value;
    }

}

int main(){
    int arr[]={3,2,1,5,7,-1,5,7,9,0};
    int len= sizeof(arr)/ sizeof(int);
    insertSort(arr,len);
    int i=0;
    for(;i<len;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");
    return 0;
}
