package algo

func RemoveElement(nums []int, val int) int {
	length:=len(nums)
	i:=0
	for j:=0;j<length ;j++  {
		//等于的时候i停止走
		if nums[j]!=val{
			nums[i]=nums[j]
			i++
		}
	}
	return i;
}
/*
 1 2 3 2 2 5    2

 */

