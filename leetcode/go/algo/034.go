package algo

func SearchRange(nums []int, target int) ( []int) {
	left := -1
	right := -1
	length := len(nums)
	i := 0
	j := length - 1
	for i <= j {
		mid := (i + j) / 2
		if target > nums[mid] {
			i = mid + 1
		} else if target < nums[mid] {
			j = mid - 1
		} else {
			//左边扩展
			if mid > i {
				if nums[mid-1] == target {
					for k := mid - 1; k >= i; k-- {
						if nums[k] != target {
							break
						} else {
							left = k
						}
					}
				} else {
					left = mid
				}
			} else {
				left = mid
			}

			//右侧扩展
			if mid < j {
				if nums[mid+1] == target {
					for k := mid + 1; k <= j; k++ {
						if nums[k] != target {
							break
						} else {
							right = k
						}
					}
				} else {
					right = mid
				}
			} else {
				right = mid
			}
			break;
		}
	}

	return []int{left, right}
}
