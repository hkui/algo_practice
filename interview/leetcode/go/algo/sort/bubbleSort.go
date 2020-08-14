package sort

import "algo_practice/algo"

func BubbleSort(arr []int)[]int  {
	count:=len(arr)
	for i:=0;i<count-1;i++{
		changed:=false
		for j:=0;j<count-1;j++{
			if arr[j]>arr[j+1]{
				algo.Swap(arr,j,j+1)
				changed=true
			}
		}
		if !changed{
			return arr
		}
	}
	return arr
}
