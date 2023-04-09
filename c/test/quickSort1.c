#include <stdio.h>
#include "../utils.h"

int partition(int arr[], int left, int right) {
    int privot = arr[left];//分区点

    while (left < right) {
        while (left < right && arr[right] > privot) {
            right--;
        }
        //arr[right]<=privot
        if (left < right) {
            arr[left] = arr[right];
            left++;
        }

        while (left < right && arr[left] < privot) {
            left++;
        }
        //arr[left]>=privot
        if (left < right) {
            arr[right] = arr[left];
            right--;
        }

    }
    arr[left] = privot;
    return left;
}

void quickSort(int arr[], int left, int right) {
    if (left >= right) {
        return;
    }
    int p = partition(arr, left, right);
    quickSort(arr, left, p - 1);
    quickSort(arr, p + 1, right);
}

int main() {
    int arr[] = {4, 2, 6, 5, 1, 3, -1};
    int length = sizeof(arr) / sizeof(arr[0]);

    PRINT_INT_ARR(arr);
    quickSort(arr, 0, length - 1);

    PRINT_INT_ARR(arr);
    return 0;
}