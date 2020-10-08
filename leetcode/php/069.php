<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/8
 * Time: 23:43
 */

/**
 * @param Integer $x
 * @return Integer
 * x的平方根
 */
function mySqrt($x) {
    $low=1;
    $high=$x;
    $ans=0;
    while($low<=$high){
        $mid=$low+(($high-$low)>>1);
        if($mid*$mid<=$x){
            $ans=$mid;
            $low=$mid+1;
        }else{
            $high=$mid-1;
        }

    }
    return $ans;
}
echo mySqrt(1000);
