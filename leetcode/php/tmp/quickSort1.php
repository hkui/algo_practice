<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/21
 * Time: 22:22
 */

function quickSort(&$arr,$l,$r){
    if($l>=$r){
        return;
    }
    $provitIndex=partition($arr,$l,$r);
    quickSort($arr,$l,$provitIndex-1);
    quickSort($arr,$provitIndex+1,$r);

}
function partition(&$arr,$left,$right){
    $provit=$arr[$right];
    while($left<$right){
        while($arr[$left]<$provit && $left<$right){
            $left++;
        }
        if($arr[$left]>$provit){
            $arr[$right]=$arr[$left];
            $right--;
        }
        while($arr[$right]>$provit && $left<$right){
            $right--;
        }
        if($arr[$right]<$provit){
            $arr[$left]=$arr[$right];
            $left++;
        }
    }
    $arr[$left]=$provit;
    return $left;
}
$arr=[4,2,6,5,1,3];
quickSort($arr,0,count($arr)-1);
print_r($arr);