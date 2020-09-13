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
$nums=[-2,1,-3,4,-1,2,1,-5,4];
$nums=[1];
echo maxSubArray($nums);