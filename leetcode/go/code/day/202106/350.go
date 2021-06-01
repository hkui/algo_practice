package _02106

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
