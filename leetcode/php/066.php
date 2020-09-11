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
    $low=0;
    for($i=$len-1;$i>=0;$i--){
        if($i==$len-1){
            if($digits[$i]+1>9){
                $digits[$i]=($digits[$i]+1)%10;
                $low=1;
            }else{
                $digits[$i]=$digits[$i]+1;
                $low=0;
            }
        }else{
            if($digits[$i]+$low>9){
                $digits[$i]=($digits[$i]+$low)%10;
                $low=1;
            }else{
                $digits[$i]=$digits[$i]+$low;
                $low=0;
            }
        }

    }
    if($low>0){
        array_unshift($digits,$low);
    }
    return $digits;
}

$digits=[9,9,9];
$r=plusOne($digits);
print_r($r);