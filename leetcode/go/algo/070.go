package algo

//爬楼梯
func ClimbStairs(n int) int {
	if n<=2{
		return n
	}
	var fn int
	f0:=1
	f1:=2

	for i:=2;i<n;i++{
		fn=f0+f1
		f0=f1
		f1=fn
	}
	return fn
}
