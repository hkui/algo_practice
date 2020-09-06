<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/6
 * Time: 14:04
 * 柱状图中最大的矩形
 */

//暴力破解法 这种在leetcode时间过不了 基于栈解法的基础
function largestRectangleArea1($heights)
{
    $len = count($heights);
    if ($len < 1) {
        return 0;
    }
    $maxArea = 0;
    foreach ($heights as $key => $h) {
        $i = $j = $key;
        while ($i > 0 && $heights[$i - 1] >= $h) {
            $i--;
        }
        while ($j < $len - 1 && $heights[$j + 1] >= $h) {
            $j++;
        }
        $w = $j - $i + 1;
        $maxArea = max($maxArea, $w * $h);
    }
    return $maxArea;
}

//栈解法
function largestRectangleArea($heights)
{
    $len = count($heights);
    if ($len < 1) {
        return 0;
    }
    $stack = [];
    $max = 0;

    foreach ($heights as $k => $h) {
        //4,4,5,5,5,3 遇到3
        while (!empty($stack) && $h < $heights[end($stack)]) {
            $lastMax = $heights[array_pop($stack)];
            //遇到5,5
            while (!empty($stack) && $heights[end($stack)] == $lastMax) {
                array_pop($stack);
            }
            //5,5,5,3
            if (empty($stack)) {
                $w = $k;
            } else {
                $w = $k - end($stack) - 1;
            }
            $max = max($max, $w * $lastMax);
        }
        array_push($stack, $k);

    }
    while (!empty($stack)) {
        $lastIndex = array_pop($stack);
        $lastMax = $heights[$lastIndex];
        while (!empty($stack) && $lastMax == $heights[end($stack)]) {
            array_pop($stack);
        }
        if (empty($stack)) {
            $w = $len;
        } else {
//            $w=$lastIndex+1-end($stack)-1;
            $w = $len - end($stack) - 1;
        }
        $max = max($max, $w * $lastMax);
    }
    return $max;

}


$tests = [
    [2, 1, 5, 6, 2, 3],
//    [4,2,0,3,2,4,3,4],
    [],
    [0, 2],
//    [2, 1, 5, 6, 2, 3],
//    [2],

];
foreach ($tests as $t) {
    echo largestRectangleArea($t) . PHP_EOL;
}

