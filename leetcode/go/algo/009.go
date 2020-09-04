package algo

func IsPalindrome(x int) bool {
	if x < 0 {
		return false;
	}
	//个位数的都是符合的

	if x >= 0 && x < 10 {
		return true;
	}
	//最后1位是0
	if x%10 == 0 {
		return false;
	}
	//反转后和自己比较
	r := reverse(x)
	if r!=x{
		return false;
	}

	return true
}
func reverse(num int) int {
	n := 0
	pop := 0
	for num > 0 {
		pop = num % 10 //取最后1位数
		num = num / 10 //取去除最后1位数之后的数

		n = n*10 + pop

	}
	return n;
}
