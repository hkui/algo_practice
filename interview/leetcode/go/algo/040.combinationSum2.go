package algo

import "sort"

var res2[][]int

func CombinationSum2(candidates []int, target int) [][]int {
	res2=[][]int{}
	sort.Ints(candidates)
	combile2(candidates,target,[]int{},0)
	return res2
}

func combile2(candidates []int, target int,step []int,start int)  {
	if target<0{
		return
	}
	if target==0{
		tmp:=make([]int,len(step))
		copy(tmp,step)
		res2= append(res2, tmp)
	}
	length:=len(candidates)
	before:=0
	for i:=start;i<length;i++{
		if before==candidates[i]{
			continue
		}
		before=candidates[i]
		nextTarget:=target-candidates[i]
		if nextTarget<0{
			break
		}
		combile2(candidates,nextTarget,append(step, candidates[i]),i+1)
	}
}

