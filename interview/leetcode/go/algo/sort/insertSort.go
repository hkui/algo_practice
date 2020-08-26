package sort

import "algo_practice/algo"

func InsertSort(arr []int) {
	cnt := len(arr)
	for i := 1; i < cnt; i++ {
		j := i - 1;
		for j >= 0 {
			if arr[j+1] < arr[j] {
				algo.Swap(arr, j+1, j)
				j--
			} else {
				break
			}
		}
	}
}
func InsertSort1(arr []int) {
	cnt := len(arr)
	for i := 1; i < cnt; i++ {
		j := i - 1;
		tmpi := arr[j+1]
		for j >= 0 {
			//j后挪，放在j+1
			if arr[j] > tmpi {
				arr[j+1] = arr[j]
				j--
			} else {
				break
			}
		}
		arr[j+1] = tmpi
	}
}
