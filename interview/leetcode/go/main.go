package main

import (
    "fmt"
)

func sliceFunc(i []int, num int) []int {
    for j := 0; j < num; j++ {
        i = append(i, 3)
    }
    fmt.Println("i=",i)
    i[0] = num
    return i
}
func main() {
    s := make([]int, 0, 3)
    s = append(s, 1)
    fmt.Printf("cap=%d\ts=%v\n",cap(s),s)//3 s=[1]
    fmt.Println("=========")
    s1 := sliceFunc(s, 2)
    fmt.Printf("cap=%d\ts=%v\n",cap(s),s)//s=[2]
    fmt.Printf("cap=%d\ts1=%v\n",cap(s1),s1) //s1=[2,3,3]

    fmt.Println("=========")
    s2 := sliceFunc(s, 3)
    fmt.Printf("cap=%d\ts=%v\n",cap(s),s)
    fmt.Printf("cap=%d\ts1=%v\n",cap(s1),s1)
    fmt.Printf("cap=%d\ts2=%v",cap(s2),s2)
}