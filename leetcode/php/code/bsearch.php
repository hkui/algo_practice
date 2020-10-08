<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/8
 * Time: 20:11
 *
 * 二分查找代码
 * bsearch 二分查找
 * bsearch_recursion 递归方式二分查找
 *
 */

/**
 * @param $arr
 * @param $n
 * @return int
 * 最基本的二分查找
 */
function bsearch($arr, $n)
{
    $len = count($arr);
    $low = 0;
    $high = $len - 1;
    //特别注意边界
    while ($low <= $high) {
        //溢出时
        //$mid=intval(($low+$high)/2);
        $mid = $low + (($high - $low) >> 1);
        if ($arr[$mid] == $n) {
            return $mid;
        }
        if ($arr[$mid] > $n) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return -1;
}

#-----------【递归方式的】-------

function bsearch_recursion($arr, $n)
{
    return bsearch_recursion_internally($arr, 0, count($arr) - 1, $n);
}

function bsearch_recursion_internally($arr, $low, $high, $n)
{
    if ($low > $high) {
        return -1;
    }
    $mid = $low + (($high - $low) >> 1);
    if ($n == $arr[$mid]) {
        return $mid;
    }
    if ($n > $arr[$mid]) {
        return bsearch_recursion_internally($arr, $mid + 1, $high, $n);
    }
    return bsearch_recursion_internally($arr, $low, $mid - 1, $n);
}

#-------------【递归方式结束】---------

$tests = [
    [[1, 2, 3, 4, 5, 6], 5],
    [[1, 2, 3], 3], //
];
foreach ($tests as $t) {
    echo bsearch_recursion($t[0], $t[1]) . PHP_EOL;
}