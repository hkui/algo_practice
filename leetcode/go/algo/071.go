package algo

import (
	"container/list"
	"strings"
)

func Algo71_simplifyPath(path string)(string)   {
	pa:=strings.Split(path,"/")
	stack:=list.New()
	for _,s:=range pa{
		if len(s)>0{
			if s==".."{
				if stack.Len()>0{
					stack.Remove(stack.Back())
				}
			}else if s=="."{
				continue
			}else{
				stack.PushBack(s)
			}
		}
	}
	ret:=""
	for item:=stack.Front();nil!=item;item=item.Next(){
		if str,ok:=item.Value.(string);ok{
			ret+=str+"/"
		}
	}
	ret="/"+strings.Trim(ret,"/")
	return ret
}
