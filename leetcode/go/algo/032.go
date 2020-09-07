package algo

import (
	"container/list"
)

func LongestValidParentheses(s string) int {
	slen := len(s)
	if slen < 2 {
		return 0
	}
	stack := list.New()
	stack.PushBack(-1)
	maxLen := 0

	for i := 0; i < slen; i++ {
		str := s[i : i+1]
		if str == "(" {
			stack.PushBack(i)
		} else {
			lastIndex := stack.Back().Value.(int)

			if lastIndex >= 0 && s[lastIndex:lastIndex+1] == "(" {
				//fmt.Println("str=",str," i=",i," back=",stack.Back().Value)
				stack.Remove(stack.Back())
				nowLen := i - stack.Back().Value.(int)
				if nowLen > maxLen {
					maxLen = nowLen
				}
			} else {
				stack.PushBack(i)
			}
		}

	}
	return maxLen
}
