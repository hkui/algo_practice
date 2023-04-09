//
// Created by hkui on 2023-04-08.
//
#ifndef ALGO_PRACTICE_UTILS_H

#include <string.h>
#include <stdio.h>

#define ALGO_PRACTICE_UTILS_H

#define PRINT_INT_ARR(arr) \
do{\
int len=sizeof(arr)/sizeof(arr[0]); \
char dst[100]="";                           \
int i=0;                   \
char *format="%d,";        \
for(;i<len;i++){           \
     format=(i==len-1)?"%d":"%d," ;                      \
     char tmp[10];\
     sprintf(tmp,format,arr[i]);    \
     strcat(dst,tmp);                      \
}                         \
 printf("%s=[%s]\n",#arr,dst);         \
} while(0)

#define PRINT(a) \
do{                 \
printf(#a"=%d\n",a);\
}while(0);

#endif //ALGO_PRACTICE_UTILS_H
