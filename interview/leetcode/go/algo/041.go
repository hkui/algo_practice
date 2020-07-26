package algo

func FirstMissingPositive(nums []int) int {
	length:=len(nums)
	var i int
	for i=0;i<length;i++{
		num:=nums[i]
		//当前位置的值是否需要处理
		//num如果小于1 或者大于数组长度 或者已经处于正确的位置 直接跳过
		if num<1 ||num>length||num==i+1{
			continue
		}
		//值要放在的位置上已经存在正确的值
		if nums[num-1]==num{
			continue
		}
		//交换 i与num-1处的数据
		Swap(nums,i,num-1)

		//持续判断i处的数据是否符合该位置
		for nums[i]!=i+1 && nums[i]>=1 && nums[i]<=length && nums[nums[i]-1]!=nums[i]{
			Swap(nums,i,nums[i]-1)
		}

	}
	k:=0

	for k=0;k<length;k++{
		if nums[k]!=k+1{
			return k+1
		}
	}
	return k+1
}

func Swap(arr []int,i,j int)  {
	tmp:=arr[i]
	arr[i]=arr[j]
	arr[j]=tmp
}
