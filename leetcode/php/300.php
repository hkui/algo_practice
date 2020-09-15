<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/14
 * Time: 23:20
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function lengthOfLIS($nums) {
    $len=count($nums);
    $dp=[];
    $max=1;
    for ($i=0;$i<$len;$i++){
        $dp[$i]=1;
    }
    for($i=1;$i<$len;$i++){
        $maxBefore=0;
        for($j=0;$j<$i;$j++){
            if($nums[$j]<$nums[$i]){
                $maxBefore=max($maxBefore,$dp[$j]);
            }
        }
        $dp[$i]=$dp[$i]+$maxBefore;
        $max=max($max,$dp[$i]);

    }
   return $max;
}
$nums=[10,9,2,5,3,7,101,18];
lengthOfLIS($nums);