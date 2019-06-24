#include <stdio.h>
#include <stdlib.h>

typedef struct {

} arrayQueue;

int main(){
    int size=4;
    int *array=malloc(size*sizeof(int));

    int i=0;
    for (; i <size ; i++) {
        array[i]=i;
    }

    return 0;
}