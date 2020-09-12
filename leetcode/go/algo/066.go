package algo

func PlusOne(digits []int) []int {
	length := len(digits)
	low := 1
	for i := length - 1; i >= 0; i-- {
		digits[i] = (digits[i] + low) % 10
		if digits[i] != 0 {
			return digits
		}
		low = 1;
	}
	ret := make([]int, 1)

	ret[0] = low
	ret = append(ret, digits...)
	return ret
}
