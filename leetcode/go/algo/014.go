package algo

import "strings"

func LongestCommonPrefix(strs []string) string {
	strsLen:=len(strs)
	if strsLen<1{
		return ""
	}
	first:=strs[0]
	firstLen:=len(first)
	prefix:=""
	for i:=0;i<firstLen;i++{
		prefix=first[0:i+1]
		for j:=1;j<strsLen;j++{
			if strings.Index(strs[j],prefix)!=0{
				return prefix[0:i]
			}
		}
	}
	return prefix
}
