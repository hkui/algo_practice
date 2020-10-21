<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/3
 * Time: 22:58
 * 复习快排
 */

/**
 * @param $arr
 * @param $p    起始区间位置
 * @param $r    结束区间位置
 * @return mixed
 */
function partition(&$arr,$p,$r){
    $privot=$arr[$r];
    $i=$p;
    //[p,i-1] i [i+1,r]

    for($j=$p;$j<$r;$j++){
        if($arr[$j]<$privot){
            $tmp=$arr[$i];
            $arr[$i]=$arr[$j];
            $arr[$j]=$tmp;
            $i++;
        }
    }

    $arr[$r]=$arr[$i];
    $arr[$i]=$privot;
    return $i;
}

/**
 * @param $arr
 * @param $l 开始排序的起始位置(包括)
 * @param $r 开始排序的结束位置(包括)
 */

function quickSort(&$arr,$l,$r){
    if($l>=$r){
        return ;
    }
    $i=partition1($arr,$l,$r);
    quickSort($arr,$l,$i-1);
    quickSort($arr,$i+1,$r);
}

function partition1(&$arr,$left,$right){
    $privot=$arr[$right];

    while($left<$right) {

        while($arr[$left]<$privot && $left<$right){
            $left++;
        }
        if($arr[$left]>$privot  && $left<$right){
            $arr[$right]=$arr[$left];
            $right--;
        }
        while($arr[$right]>$privot && $left<$right){
            $right--;
        }
        if($arr[$right]<$privot  && $left<$right){
            $arr[$left]=$arr[$right];
            $left++;
        }
    }
    $arr[$left]=$privot;
    return $left;

}

$arr= [4,2,5,1,6,3];



//partition1($arr,0,count($arr)-1);
//
//print_r($arr);die;



quickSort($arr,0,count($arr)-1);
print_r($arr);