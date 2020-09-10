<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/10
 * Time: 8:48
 */

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return NULL
 */
function rotate(&$nums, $k)
{
    $len = count($nums);
    $k = $k % $len;
    for ($i = 0; $i < intval($len / 2); $i++) {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$len - $i - 1];
        $nums[$len - $i - 1] = $tmp;
    }

    for ($i = 0; $i < intval($k / 2); $i++) {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$k - $i - 1];
        $nums[$k - $i - 1] = $tmp;
    }

    $mid = intval(($len + $k) / 2);
    for ($i = $k; $i < $mid; $i++) {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$len + $k - $i - 1];
        $nums[$len + $k - $i - 1] = $tmp;
    }
    return $nums;

}

$nums = [1, 2, 3, 4, 5, 6];
rotate($nums, 2);



