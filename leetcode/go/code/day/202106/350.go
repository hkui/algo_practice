package _02106

import (
	"sort"
)

func intersect(nums1 []int, nums2 []int) []int {
	ret:=[]int{}
	set:=make(map[int]int)
	for _,v:=range nums1{
		set[v]++
	}
	for _,v:=range nums2{
		if set[v]>0{
			ret=append(ret,v)
			set[v]--
		}
	}
	return ret
}
//和上面比无需借助ret变量存储了
func intersect1(nums1 []int, nums2 []int) []int {
	m0 := map[int]int{}
	for _, v := range nums1 {
		//遍历nums1，初始化map
		m0[v] += 1
	}
	k := 0
	for _, v := range nums2 {
		//如果元素相同，将其存入nums2中，并将出现次数减1
		if m0[v] > 0 {
			m0[v] -=1
			nums2[k] = v
			k++
		}
	}
	return nums2[0:k]
}
//如果nums1和Nums2有序
func intersectSorted(nums1 []int, nums2 []int) []int {
	sort.Ints(nums1)
	sort.Ints(nums2)
	var (
		i int
		j int
		k int
	)
	for i<len(nums1) && j<len(nums2){
		if nums1[i]==nums2[j]{
			nums1[k]=nums1[i]
			i++
			j++
			k++

		}else if nums1[i]<nums2[j] {
			i++
		}else {
			j++
		}
	}
	return nums1[:k]
}
