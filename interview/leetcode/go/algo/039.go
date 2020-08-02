package algo

import "sort"

var res [][]int

func CombinationSum(candidates []int, target int) [][]int {
	res=[][]int{}
	sort.Ints(candidates)
	var steps []int
	combile(candidates,steps,target,0)

	return res
}

func combile(nums []int,steps []int,target int,index int)  {
	if target<0{
		return
	}
	if target==0{
		tmp:=make([]int,len(steps))
		copy(tmp,steps)
		res=append(res, tmp)
		return
	}
	length:=len(nums)

	for i:=index;i<length;i++{
		num:=nums[i]
		steps_:= append(steps, num)
		target_:=target-num
		if target_<0{
			break
		}
		combile(nums,steps_,target_,i)
	}

}