package algo

func LengthOfLongestSubstring1(s string) int {
	length:=len(s)

	i:=0
	max:=0
	set:=make(map[string]int)
	for j:=0;j<length;j++{
		str:=s[j:j+1]
		if set[str]>=0{
			if set[str]+1>i{
				i=set[str]+1
			}
		}
		set[str]=j
		if  max<j-i+1{
			max=j-i+1
		}
	}
	return max;
}
