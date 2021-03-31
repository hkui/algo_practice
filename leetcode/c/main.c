#include <stdio.h>
#include "./fun/header.h"
#include "./fun/io_utils.h"


int main() {
    int nums[]={1,2,3,4,5,6};
    int rSize=2;
    int *ret=twoSum(nums,6,7,&rSize);
    PRINT_INT_ARRAY(ret,rSize);
}
