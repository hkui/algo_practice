package algo



func LengthOfLongestSubstring(s string) int {
	type myint int
	slen:=myint(len(s))
	processed:=map[uint8]myint{}

	left:=myint(0)
	max:=myint(0)
	for i:=myint(0);i<slen;i++{
		item:=s[i]
		if index,exists:=processed[item];exists{
			if left<index+1{
				left=myint(index+1)
			}

		}
		processed[item]=i
		nowMax:=i-left+1
		if nowMax>max{
			max=nowMax
		}
	}
	return int(max)
}
