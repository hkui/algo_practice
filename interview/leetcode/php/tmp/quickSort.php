<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/27
 * Time: 22:52
 */

function part(&$arr){
    $mid=0;
    $provit=$arr[$mid];
    $left=0;
    $right=count($arr)-1;

    while($left<$right){
        while($arr[$right] >$provit && $left<$right){
            $right--;
        }
        if($arr[$right]<$provit && $left<$right){
            $arr[$left]=$arr[$right];
            $left++;
        }


        while($arr[$left]<$provit && $left<$right){
            $left++;
        }

        if($arr[$left]>$provit && $left<$right){
            $arr[$right]=$arr[$left];
            $right--;
        }
    }
    $arr[$left]=$provit;


}
$arr=[10,2,6,5,1,3];

part($arr);

print_r($arr);
