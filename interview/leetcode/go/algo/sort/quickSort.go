package sort

func partition(arr []int,left int,right int)int  {
	privot:=arr[left]
	for left<right{
		for arr[right]>privot && left<right  {
			right--;
		}
		if arr[right]<privot && left<right{
			arr[left]=arr[right]
			left++
		}
		for arr[left]<privot && left<right{
			left++;
		}
		if arr[left]>privot && left<right{
			arr[right]=arr[left]
			right--
		}
	}
	arr[left]=privot
	return left
}
func QuickSort(arr []int,left int,right int)  {
	if left>=right{
		return
	}
	mid:=partition(arr,left,right)
	QuickSort(arr,left,mid-1)
	QuickSort(arr,mid+1,right)

}
