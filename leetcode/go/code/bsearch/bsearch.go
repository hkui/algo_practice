package bsearch

/**
Bsearch 二分查找
BsearchRecursion 递归二分查找
*/

func Bsearch(arr []int, n int) int {
	length := len(arr)
	low := 0
	high := length - 1
	for low <= high {
		mid := low + ((high - low) >> 1)
		if arr[mid] == n {
			return mid
		}
		if n < arr[mid] {
			high = mid - 1
		} else {
			low = mid + 1
		}
	}
	return -1;
}

/**
递归方式
*/
func BsearchRecursion(arr []int, n int) int {
	return bsearchRecursionInner(arr, 0, len(arr)-1, n)
}

func bsearchRecursionInner(arr []int, low int, high int, n int) int {
	if low > high {
		return -1
	}
	mid := low + ((high - low) >> 1)
	if arr[mid] == n {
		return mid
	}
	if arr[mid] > n {
		return bsearchRecursionInner(arr, low, mid-1, n)
	}
	return bsearchRecursionInner(arr, mid+1, high, n)

}
