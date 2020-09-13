package algo

import "sort"

func ThreeSum(nums []int) [][]int {
	var ret [][]int
	length := len(nums)
	if length<3{
		return ret
	}

	sort.Ints(nums)
	for i := 0; i < length-2; i++ {
		if nums[i] > 0 {
			return ret
		}
		if i > 0 && nums[i] == nums[i-1] {
			continue
		}
		m := i + 1
		n := length - 1
		for m < n {
			target := nums[i] + nums[m] + nums[n]
			if target < 0 {
				m++
			} else if (target > 0) {
				n--
			} else {
				ret = append(ret, []int{nums[i], nums[m], nums[n]})
				for m < n && nums[m] == nums[m+1] {
					m++
				}
				for m < n && nums[n] == nums[n-1] {
					n--;
				}
				m++
				n--;
			}

		}

	}
	return ret
}
