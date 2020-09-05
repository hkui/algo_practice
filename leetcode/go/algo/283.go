package algo

func MoveZeroes(nums []int) {
	length := len(nums)
	lastNot0Index := 0 //即将要放入的最后1个非0 元素
	for i := 0; i < length; i++ {
		if nums[i] != 0 {
			if i > lastNot0Index {
				nums[lastNot0Index] = nums[i]
				nums[i] = 0

			}
			lastNot0Index++;
		}
	}
}
