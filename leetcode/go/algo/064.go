package algo
/**
[
  [1,3,1],
  [1,5,1],
  [4,2,1]
]
dp[i][j]=dp[i+1][j]+dp[i][j+1] //分别向下，向右
所以应该从右下角开始填表

最后1行，最后1列的值可以先求出
 */



func MinPathSum(grid [][]int) int {
	h:=len(grid)
	w:=len(grid[0])
	dp:=make(map[int]map[int]int)
	for i:=0;i<h;i++{
		dp[i]=make(map[int]int)
	}
	//右下角的元素
	dp[h-1][w-1]=grid[h-1][w-1]
	//处理最后1行,从倒数第二个元素起
	for j:=w-2;j>=0;j--{
		dp[h-1][j]=dp[h-1][j+1]+grid[h-1][j]
	}
	//处理最后1列 ，从下往上，倒数第二个元素起
	for i:=h-2;i>=0;i--{
		dp[i][w-1]=dp[i+1][w-1]+grid[i][w-1]
	}
	//从右->左->上右->左 开始填充，
	
	for i:=h-2;i>=0;i--{
		for j:=w-2;j>=0;j--{
			dp[i][j]=min(dp[i+1][j],dp[i][j+1])+grid[i][j]
		}
	}
	return dp[0][0];
}
