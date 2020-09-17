package algo

/**
[2,7,9,3,1],
[2,1,1,2]
 */
func Rob(nums []int) int {
	count:=len(nums)
	ret:=0
	dp:=make(map[int]int)
	for i:=count-1;i>=0;i--{
		if i+2>count-1{
			dp[i]=nums[i]
		}else{
			tmpMax:=0
			if i+3>count-1{
				tmpMax=dp[i+2]
			}else{
				tmpMax=max(dp[i+2],dp[i+3])


			}
			dp[i]=tmpMax+nums[i]
		}
		ret=max(ret,dp[i])
	}
	return ret;
}
