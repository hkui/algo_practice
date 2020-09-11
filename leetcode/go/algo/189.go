package algo

func Rotate(nums []int, k int) {
	length := len(nums)
	k = k % length

	for i := 0; i < length/2; i++ {
		tmp := nums[i]
		nums[i] = nums[length-i-1]
		nums[length-i-1] = tmp
	}
	for i := 0; i < k/2; i++ {
		tmp := nums[i];
		nums[i] = nums[k-i-1]
		nums[k-i-1] = tmp
	}
	for i := k; i < (k+length)/2; i++ {
		tmp := nums[i];
		nums[i] = nums[k+length-i-1]
		nums[k+length-i-1] = tmp
	}
}
