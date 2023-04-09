#include "../utils.h"
void insertSort(int arr[],int size){
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
    int length= sizeof(arr) / sizeof(int);
    PRINT_INT_ARR(arr);
    insertSort(arr, length);
    PRINT_INT_ARR(arr);

}

