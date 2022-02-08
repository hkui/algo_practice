package algo

//删除有序数组中的重复项

func RemoveDuplicates(nums []int) int {
	length := len(nums)
	if length < 1 {
		return 0
	}
	var i int = 0
	var j int = 1

	for j < length {
		if nums[j] != nums[i] {
			nums[i+1] = nums[j]
			i++
		}
		j++
	}
	return i + 1
}
