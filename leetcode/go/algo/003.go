package algo

func LengthOfLongestSubstring(s string) int {
	length:=len(s)
	i:=0
	max:=0
	set:=make(map[string]int)
	for j:=0;j<length;j++{
		str:=s[j:j+1]
		//对于不存在的key,set值为0
		if index,exists:=set[str];exists{
			if index+1>i{
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
