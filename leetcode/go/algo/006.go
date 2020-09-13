package algo
/**
同样的测试用例，leetcode 测试代码能过，提交不不行，
 */

func Convert(s string, numRows int) string {
	ret:=make(map[int]string,numRows-1)
	length:=len(s)
	var y int=0
	for i:=0;i<numRows;i++{
		ret[i]=""
	}
	var down bool=true
	for i:=0;i<length;i++{
		ret[y]=ret[y]+s[i:i+1]
		if y==0{
			down=true
		}else if y==numRows-1{
			down=false
		}
		if down{
			y++
		}else{
			y--;
		}
	}
	str:=""
	for _,v:=range ret{
		str=str+v
	}
	return str
}
