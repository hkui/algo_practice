package algo

func LengthOfLongestSubstring(s string) int {
	length := len(s)
	i := 0
	max := 0
	set := make(map[string]int)
	for j := 0; j < length; j++ {
		str := s[j : j+1]
		//对于不存在的key,set值为0
		if index, exists := set[str]; exists {
			if index+1 > i {
				i = set[str] + 1
			}
		}
		set[str] = j
		if max < j-i+1 {
			max = j - i + 1

		}
	}
	return max
}
func lengthOfLongestSubstring(s string) int {
	length := len(s)
	left := 0
	right := 0
	processed := make(map[uint8]int, length)
	max := 0

	for ; right < length; right++ {
		char := s[right]
		if index, exist := processed[char]; exist {
			if index+1 > left {
				left = index + 1
			}
		}
		processed[char] = right
		if right-left+1 > max {
			max = right - left + 1
		}
	}
	return max
}
