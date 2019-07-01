//归并排序

#include <stdio.h>
//总的归并排序
void mergeSort(int  arr[],int size){
    int i=0;
    int mid=(i+size)%2;
    mergeSort_(i,mid);
    mergeSort_(mid+1,size-1);
    merge();

}

//合并两个有序数组
merge(){

}

mergeSort_(p,r){

}

int main(){

    return 0;
}
