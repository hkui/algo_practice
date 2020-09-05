package algo

func MaxArea(height []int) int {
	length:=len(height)
	left:=0
	right:=length-1
	maxArea:=0
	for left<right{
		area:=(right-left)*min(height[left],height[right])
		maxArea=max(area,maxArea)
		if height[left]<height[right]{
			left++
		}else if height[left]>height[right] {
			right--
		}else{
			left++
		}
	}
	return maxArea
}

