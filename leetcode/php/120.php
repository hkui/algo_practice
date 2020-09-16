<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/16
 * Time: 23:06
 */

/**
 * @param Integer[][] $triangle
 * @return Integer
 */
function minimumTotal($triangle) {
    $h=count($triangle);
    $dp=[];

    for($i=$h-1;$i>=0;$i--){
        for($j=0;$j<=$i;$j++){
            if($i==$h-1){
                $dp[$i][$j]=$triangle[$i][$j];
            }else{
                $minLow=min($dp[$i+1][$j],$dp[$i+1][$j+1]);
                $dp[$i][$j]=$triangle[$i][$j]+$minLow;
            }
        }
    }
    return $dp[0][0];
}
$triangle=[
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
];
$triangle=[
    [-1],
    [3,2],
    [-3,1,-1]];
echo minimumTotal($triangle);
