<?php
/**
 * Created by PhpStorm.
 * User: 764432054@lepu.cn
 * Date: 2020/10/20
 * Time: 19:21
 */
/**
 * @param $arr
 * @param $n
 * @return int
 * 基本的二分查找
 */
function bsearch($arr, $n){
    $len=count($arr);
    $i=0;
    $j=$len-1;
    while ($i<=$j){
        $mid=$i+(($j-$i)>>1);
        if($arr[$mid]==$n){
            return $mid;
        }
        if($n<$arr[$mid]){
            $j=$mid-1;
        }else{
            $i=$mid+1;
        }
    }
    return -1;
}

/**
 * @param $arr
 * @param $n
 * 递归方式
 */
function bsearch_recursion($arr, $n){
    return bsearch_recursion_inter($arr,0,count($arr)-1,$n);
}

function bsearch_recursion_inter($arr,$i,$j,$n){
    if($i>$j){
        return -1;
    }
    $mid=$i+(($j-$i)>>1);
    if($arr[$mid]==$n){
        return $mid;
    }
    if($n<$arr[$mid]){
        return bsearch_recursion_inter($arr,$i,$mid-1,$n);
    }
    return bsearch_recursion_inter($arr,$mid+1,$j,$n);
}

$tests = [
    [[1, 2, 3, 4, 5, 6], 5],
    [[1, 2, 3], 3], //
];
foreach ($tests as $t) {
    echo bsearch_recursion($t[0], $t[1]) . PHP_EOL;
}