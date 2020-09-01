<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/26
 * Time: 22:43
 */

function insertSort(&$arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $j = $i - 1;
        //处理[0,j+1]这个数组,现在已知[0,j]是有序的，需要把j+1放到正确的位置即可
        while ($j >= 0) {
            if ($arr[$j + 1] < $arr[$j]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
                $j--;
            } else {
                break;
            }
        }
    }
}

function insertSort1(&$arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        //i位置的元素挖出来
        $tmpi = $arr[$i];
        $j = $i - 1;
        while ($j >= 0) {
            if ($arr[$j] > $tmpi) {
                //j处的元素后挪
                $arr[$j + 1] = $arr[$j];
                $j--;
            } else {
                break;
            }
        }
        $arr[$j + 1] = $tmpi;
    }
}

$arr = [4, 2, 5, 1, 6, 3];


insertSort1($arr);
print_r($arr);
