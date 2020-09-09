package algo

import "sort"

//hash计数
/*
时间复杂度O(m+n)
空间 O(min(m,n))
 */
func Intersect1(nums1 []int, nums2 []int) []int {
	set := make(map[int]int)
	ret := []int{}
	for _, v := range nums1 {
		set[v]++
	}
	for _, v := range nums2 {
		if set[v] > 0 {
			ret = append(ret, v)
			set[v]--
		}
	}
	return ret
}

//hash计数 改变输入值了
func Intersect(nums1 []int, nums2 []int) []int {
	set := make(map[int]int)

	for _, v := range nums1 {
		set[v]++
	}
	k := 0
	for _, v := range nums2 {
		if set[v] > 0 {
			nums2[k] = v
			set[v]--
			k++
		}
	}
	return nums2[0:k]
}

/**
排序后双指针法
比上面的hash内存消耗的少
时间  O(mlogm+nlogn)
空间:O(min(m,n))
*/
func Intersect2(nums1 []int, nums2 []int) []int {
	sort.Ints(nums1)
	sort.Ints(nums2)
	ret := []int{}

	len1 := len(nums1)
	len2 := len(nums2)

	for i, j := 0, 0; i < len1 && j < len2; {
		if nums1[i] == nums2[j] {
			ret = append(ret, nums1[i])
			i++
			j++
		} else if (nums1[i] < nums2[j]) {
			i++
		} else {
			j++
		}
	}
	return ret
}
