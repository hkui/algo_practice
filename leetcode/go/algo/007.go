package algo

import (
	"math"
)

//整数反转
func Reverse(x int) int {
	rev := 0
	min := math.MinInt32
	max := math.MaxInt32
	flag:=-1
	if x>0{
		flag=1
	}
	for x != 0 {
		last := x % 10
		x = x / 10
		if flag< 0 {
			if min-rev*10 > last {
				return 0
			}
		} else {
			if max-rev*10 < last {
				return 0
			}
		}
		rev = rev*10 + last
	}
	return rev
}
