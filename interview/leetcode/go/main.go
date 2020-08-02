package main

import (
	"fmt"
)

var res [][]int //保存被递归函数append的结果

func CombinationSum(candidates []int, target int) [][]int {
	var steps []int
	combile(candidates, steps, target, 0)
	return res
}

func combile(nums []int, steps []int, target int, index int) {
	if target < 0 {
		return
	}
	if target == 0 {
		fmt.Println("steps=", steps)
		tmp:=make([]int,len(steps))
		copy(tmp,steps)
		res=append(res, tmp)
		return
	}
	length := len(nums)
	for i := index; i < length; i++ {
		num := nums[i]
		steps_ := append(steps, num)
		target_ := target - num
		if target_ < 0 {
			break
		}
		combile(nums, steps_, target_, i)
	}
}
func main() {
	nums := []int{2, 3, 5, 7}
	target := 8
	res := CombinationSum(nums, target)
	fmt.Println(res)
}
