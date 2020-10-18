package algo

func Search(nums []int, target int) int {
	length:=len(nums)
	i:=0
	j:=length-1

	for i<=j{
		mid:=(i+j)/2
		if target==nums[mid]{
			return mid
		}
		//左边有序
		if nums[mid]>=nums[i]{
			//nums[i]<nums[mid]<target
			if target >nums[mid]{
				i=mid+1
			}else{

				//nums[i]<=target<=nums[mid]
				if target>=nums[i]{
					//目标在i,mid之间
					j=mid-1
				}else{
					//target<nums[i]<=nums[mid]
					//目标在mid,j这个区间
					i=mid+1
				}

			}
		}else{
			//右边有序
			//nums[mid]<=num[j]

			if target>=nums[mid] && target<=nums[j]{
				i=mid+1
			}else{
				j=mid-1
			}
		}
	}

	return -1
}