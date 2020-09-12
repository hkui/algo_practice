<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/11
 * Time: 23:16
 */

/**
 * @param Integer[] $digits
 * @return Integer[]
 */
function plusOne($digits) {
    $len=count($digits);
    $low=1;
    for($i=$len-1;$i>=0;$i--){
        $digits[$i]=($digits[$i]+$low)%10;
        if($digits[$i]!=0){
            return $digits;
        }else{
            $low=1;
        }

    }
    if($low>0){
        array_unshift($digits,$low);
    }
    return $digits;
}

$digits=[9,9,9];
//$digits=[1,2,3];
$r=plusOne($digits);
print_r($r);