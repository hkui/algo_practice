package algo

//两数之和
func TwoSum(nums []int, target int) []int {

	set:=make(map[int]int)

	for k,v:=range nums{
		another:=target-v
		if _,exists:=set[another];exists{
			return []int{set[another],k}
		}
		set[v]=k
	}
	return []int{}
}
