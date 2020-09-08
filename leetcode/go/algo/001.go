package algo

func TwoSum(nums []int, target int) []int  {
	dict:=make(map[int]int)
	for k,v:=range nums{
		another:=target-v
		if index,exists:=dict[another];exists{
			return []int{index,k}
		}
		dict[v]=k
	}
	return []int{}
}
