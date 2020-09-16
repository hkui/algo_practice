package algo

func MinimumTotal(triangle [][]int) int {
	h:=len(triangle)
	dp:=make(map[int]map[int]int,h)
	for i:=0;i<h;i++{
		dp[i]=make(map[int]int);
	}

	for i:=h-1;i>=0;i--{
		for j:=0;j<=i;j++{
			if i==h-1{
				dp[i][j]=triangle[i][j]
			}else{
				tmpMin:=min(dp[i+1][j],dp[i+1][j+1])
				dp[i][j]=tmpMin+triangle[i][j]

			}
		}
	}
	return dp[0][0];
}
