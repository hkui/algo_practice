package algo

func maxSubArray(nums []int) int {
    length:=len(nums)

    maxBefore:=nums[0]
    max:=maxBefore
    for i:=1;i<length;i++{
        if maxBefore>0{
            maxBefore+=nums[i]
        }else{
            maxBefore=nums[i]
        }
        if maxBefore>max{
            max=maxBefore
        }
    }
    return max

}
