<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/13
 * Time: 23:54
 */

/**
 * @param Integer[] $nums
 * @return Integer
 * 贪心算法
 */
function maxSubArray($nums) {
    $len=count($nums);
    $maxBefore=$nums[0];
    $max=$maxBefore;
    for($i=1;$i<$len;$i++){
        if($maxBefore<0){
            $maxBefore=$nums[$i];
        }else{
            $maxBefore+=$nums[$i];
        }
        $max=max($maxBefore,$max);
    }
    return $max;
}

/**
 *动态规划
 */
function maxSubArrayDp($nums){
    $len=count($nums);
    if($len<1){
        return 0;
    }

    $dp[0]=$nums[0];
    $max=$dp[0];

    for($i=1;$i<$len;$i++){
        $dp[$i]=$dp[$i-1]>0?($nums[$i]+$dp[$i-1]):$nums[$i];
        $max=max($max,$dp[$i]);
    }
    return $max;
}

$nums=[-2,1,-3,4,-1,2,1,-5,4];
//$nums=[1];
echo maxSubArrayDp($nums);