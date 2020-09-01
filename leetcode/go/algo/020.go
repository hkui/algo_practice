package algo

import (
	"container/list"
)

func Algo20_isValid(s string) bool  {
	dct:=map[string]string{
		")":"(",
		"]":"[",
		"}":"{",
	}
	stack:=list.New()
	lens:=len(s)

	for i:=0;i<lens;i++{
		word:=s[i:i+1]
		//在列表里
		if right,exist:=dct[word];exist{
			if stack.Len()<1{
				return false
			}
			if right!=stack.Back().Value{
				return false
			}
			stack.Remove(stack.Back())
		}else{
			stack.PushBack(word)
		}

	}
	return stack.Len()==0

}
