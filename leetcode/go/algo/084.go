package algo

import "container/list"

/**
暴力破解法
以1根柱子向两侧扩展
时间复杂度：O(N^2)
空间复杂度O(1)
基于栈解法的基础
*/
func LargestRectangleArea1(heights []int) int {
	lens := len(heights)
	if lens < 1 {
		return lens
	}
	area := 0
	var i, j, w int
	for key, h := range heights {
		if h == 0 {
			continue
		}
		for i = key; i > 0 && heights[i-1] >= h; {
			i--;
		}
		for j = key; j < lens-1 && heights[j+1] >= h; {
			j++
		}
		w = j - i + 1
		areaTmp := w * h
		if areaTmp > area {
			area = areaTmp
		}
	}
	return area
}

/**
基于栈的解法
*/
func LargestRectangleArea(heights []int) int {
	lens := len(heights)
	if lens < 1 {
		return lens
	}
	area := 0
	stack := list.New()
	for k, h := range heights {
		//4,4,5,5,5,3
		for stack.Len() > 0 && h < heights[stack.Back().Value.(int)] {
			lastIndex := stack.Remove(stack.Back()).(int)
			//5,5,5
			for stack.Len() > 0 && heights[lastIndex] == heights[stack.Back().Value.(int)] {
				stack.Remove(stack.Back())
			}
			w := 0

			if stack.Len() == 0 {
				w = k
			} else {
				w = k - stack.Back().Value.(int) - 1
			}
			if w*heights[lastIndex] > area {
				area = w * heights[lastIndex]
			}
		}
		stack.PushBack(k)
	}
	for stack.Len() > 0 {
		lastIndex := stack.Remove(stack.Back()).(int)
		//2,3,3,3
		for stack.Len() > 0 && heights[lastIndex] == heights[stack.Back().Value.(int)] {
			stack.Remove(stack.Back())
		}
		w := 0
		//3,3,3
		if stack.Len() == 0 {
			w = lens
		} else {
			// 2,3,3
			//w=lastIndex-stack.Back().Value.(int)
			w = lens - stack.Back().Value.(int) - 1
		}
		if w*heights[lastIndex] > area {
			area = w * heights[lastIndex]
		}
	}

	return area
}
