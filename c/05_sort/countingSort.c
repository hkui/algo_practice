//计数排序
#include <stdio.h>
#include <stdlib.h>


void countSort(int arr[],int size){
    int max=arr[0];
    int i;
    //找出最大值
    for(i=1;i<size;i++){
        if(arr[i]>max){
            max=arr[i];
        }
    }
    //[0,max]计算次数
    int *countArr=malloc(size* sizeof(int));
    for(i=0;i<size;i++){
        countArr[arr[i]]++;
    }

    int index=0;
    int j;
    for(i=0;i<=max;i++){
        for(j=0;j<countArr[i];j++){
           arr[index]=i;
           index++;
        }
    }
}

void countSort1(int arr[],int size){
    int max=arr[0];
    int i;
    //找出最大值
    for(i=1;i<size;i++){
        if(arr[i]>max){
            max=arr[i];
        }
    }
    //[0,max]计算次数
    int *countArr=malloc(size* sizeof(int));
    for(i=0;i<size;i++){
        countArr[arr[i]]++;
    }
    /*for(i=0;i<=max;i++){
        printf("countArr[%d]=%d\n",i,countArr[i]);
    }*/
    printf("--------------------\n");
    for(i=1;i<=max;i++){
        countArr[i]=countArr[i]+countArr[i-1];
    }

    /*for(i=0;i<=max;i++){
        printf("countArr[%d]=%d\n",i,countArr[i]);
    }*/
    int *r=malloc(sizeof(int)*size);
    int index;
    for(i=size-1;i>=0;i--){
        index=countArr[arr[i]]-1;
//        printf("index=%d,i=%d\n",index,i);
        r[index]=arr[i];
        countArr[arr[i]]--;
    }
    printf("--------------------\n");
    for(i=0;i<size;i++){
        arr[i]=r[i];
    }

}

int main(){
    int arr[]={2,5,3,0,2,3,0,3};
    int size= sizeof(arr)/ sizeof(int);
    countSort1(arr,size);


    int i=0;
    for(;i<size;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");

    return 0;
}
