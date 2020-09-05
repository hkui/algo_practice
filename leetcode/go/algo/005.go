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

//中心扩展方法
func expandAroundCenter(s string, i int, j int) int {
	slen := len(s)
	for i >= 0 && j < slen && s[i] == s[j] {
		i--;
		j++;
	}
	return j - i - 1;
}

//-----------------------------------------------------
//-暴力破解法 枚举所有的子串 判断长度和回文

func LongestPalindromeForce(s string) string {
	slen := len(s)
	if slen < 2 {
		return s
	}

	start := 0
	maxLen := 1 //注意起始值

	for i := 0; i < slen; i++ {
		for j := i + 1; j < slen; j++ {
			testLen := j - i + 1
			if testLen > maxLen && isPalindrome(s, i, j) {
				maxLen = testLen
				start = i

			}
		}
	}

	return s[start : maxLen+start]
}

func isPalindrome(s string, i, j int) bool {
	for i < j {
		if s[i:i+1] != s[j:j+1] {
			return false;
		}
		i++
		j--
	}
	return true
}

//--动态规划写法

func LongestPalindromeDp(s string) string {
	slen := len(s)
	if slen < 2 {
		return s
	}
	start := 0
	maxLen := 1 //注意起始值
	dp := make(map[int]map[int]bool)

	for i := 0; i < slen; i++ {
		dp[i] = map[int]bool{i: true}
	}
	for j := 1; j < slen; j++ {
		for i := 0; i < j; i++ {
			if s[i:i+1] != s[j:j+1] {
				dp[i][j] = false
			} else {
				//考察i+1到j-1长度
				//j-1-(i+1)-1<0
				if j-i < 3 {
					dp[i][j] = true
				} else {
					dp[i][j] = dp[i+1][j-1]
					//注意填表顺序
				}
			}
			if dp[i][j] && j-i+1 > maxLen {
				start = i
				maxLen = j - i + 1
			}

		}
	}
	return s[start : start+maxLen]
}
