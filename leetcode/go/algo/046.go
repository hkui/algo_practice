package algo

import (
	"encoding/json"
)

//全排列
var ret46 [][]int

func Permute1(nums []int) [][]int {
	//多个测试用例时必须初始化
	ret46=[][]int{}

	numsKv := make(map[int]int, len(nums))
	for _, num := range nums {
		numsKv[num] = 1
	}
	for _, num := range nums {
		tree46(num, numsKv, []int{num})
	}

	return ret46
}
func tree46(num int, numsKv map[int]int, step []int) {
	step_json, _ := json.Marshal(step)

	var step_ []int
	_ = json.Unmarshal(step_json, &step_)

	numsKv_json, _ := json.Marshal(numsKv)

	var numsKv_ map[int]int

	_ = json.Unmarshal(numsKv_json, &numsKv_)
	delete(numsKv_, num)

	if len(numsKv_) == 0 {
		ret46 = append(ret46, step_)
		return
	}
	for n, _ := range numsKv_ {
		tree46(n, numsKv_, append(step_, n))
	}

}
//--------------上面变量拷贝的太多耗时，下面dfs------------

var res46 [][]int

func Permute(nums []int) [][]int {
	used:=make(map[int]bool)
	res46=make([][]int,0)

	path:=make([]int,0)
	dfs46(nums,used,path)
	return res46
}
func dfs46(nums []int,used map[int]bool,path []int)  {
	if len(nums)==len(path) {
		path1:=make([]int,len(path))
		copy(path1,path)
		res46= append( res46,path1)
		return
	}
	for _,num:=range  nums{
		if used[num]{
			continue
		}
		path=append(path,num)
		used[num]=true
		dfs46(nums,used,path)
		used[num]=false
		path=path[0:len(path)-1]
	}
}


