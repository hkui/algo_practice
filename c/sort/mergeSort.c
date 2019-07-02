//归并排序

#include <stdio.h>
#include <stdlib.h>


//合并两个有序数组 --并
merge(int arr[],int p,int q){
    if(p ==q) return;
    int mid=(p+q)/2;
    printf("p=%d,q=%d\n");
    int len=q-p+1;

    int *tmpArr=(int *)malloc(len*sizeof(int));
    int i=p,j=mid+1;
    int index=0;
    while(i<=mid&& j<=q ){
        if(arr[i]<arr[j]){
            tmpArr[index]=arr[i];
            i++;
            index++;
        }else if(arr[i]>arr[j]){
            tmpArr[index]=arr[j];
            j++;
            index++;
        }else{
            tmpArr[index]=arr[i];
            index++;
            tmpArr[index]=arr[j];
            index++;
            i++;
            j++;
        }
    }
    while(i<=mid){
        tmpArr[index++]=arr[i];

        i++;
    }
    while(j<=mid){
        tmpArr[index++]=arr[j];
        j++;
    }
    int k;
    for(k=0;k<index;k++){
        arr[k+p]=tmpArr[k];
    }
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
        //将[p,mid] [mid+1,q]这两个有序数组合并为一个有序数组
        merge(arr,p,q);
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
