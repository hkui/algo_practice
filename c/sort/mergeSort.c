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

//合并两个有序数组 --并
merge(){

}

//归
mergeSort_(int arr[],int p,int q){
    //只有1个元素
    if (p==q){
        return;
    }
    //有2个元素
    if(q-p==1){
        if(arr[p]>arr[q]){
            int tmp=arr[q];
            arr[q]=arr[p];
            arr[p]=tmp;
        }
    }else{
        int mid=(p+q)/2;
        printf("mid=%d,p=%d,q=%d\n",mid,p,q);
        mergeSort_(arr,p,mid);
        mergeSort_(arr,mid+1,q);
    }

}

int main(){
    int arr[]={3,1,2,0,9,7,-1,5};
    int len=sizeof(arr)/ sizeof(int);

    mergeSort_(arr,0,len-1);
    int i;

    for(i=0;i<len;i++){
        printf("%d ",arr[i]);
    }
    printf("\n");
    return 0;
}
