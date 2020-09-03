package algo

//最长回文子串

//中心扩展法
func LongestPalindrome(s string) string {
	slen := len(s)
	if slen < 2 {
		return s
	}
	max := 0
	start := 0
	for i := 0; i < slen; i++ {
		len1 := expandAroundCenter(s, i, i)
		len2 := expandAroundCenter(s, i, i+1)
		testLen := 0
		if len1 > len2 {
			testLen = len1
		} else {
			testLen = len2
		}
		if testLen > max {
			max = testLen
			start = i - (testLen-1)/2
		}
	}
	return s[start : max+start]

}

func expandAroundCenter(s string, i int, j int) int {
	slen := len(s)
	for i >= 0 && j < slen && s[i] == s[j] {
		i--;
		j++;
	}
	return j - i - 1;
}
