<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/8
 * Time: 13:59
 */


function twoSum($nums, $target) {
    $set=[];
    foreach ($nums as $k=>$v){
        $another=$target-$v;
        if(isset($set[$another])){
            return [$set[$another],$k];
        }
        $set[$v]=$k;

    }
}
/**
0,1,2,3,4           索引

1,3,4,7,6     10    数字和  目标
方式1
1=>0
3=>1
4=>2
到7 发现3 在再字典里

方式2
9=>0
7=>1
6=>2
到3 发现7在字典里
 */

function twoSum1($nums, $target)
{
    $dict = [];
    foreach ($nums as $k=>$v){
        if(isset($dict[$v])){
            return [$dict[$v],$k];
        }
        $another=$target-$v;
        $dict[$another]=$k;
    }
    return [];
}




$nums = [2, 7, 11, 15];

$target=9;

$r=twoSum($nums,$target);
print_r($r);

