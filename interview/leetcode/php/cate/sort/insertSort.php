<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/5
 * Time: 23:03
 */
function insertSort(&$arr)
{
    $len = count($arr);
    $sortedLastIndex = 0;
    //开始遍历无序区间，往有序里倒腾,注意边界判断
    for ($i = $sortedLastIndex + 1; $i <= $len - 1; $i++) {
        //要插入的值小于有序的最大值
        if ($arr[$i] < $arr[$sortedLastIndex]) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$sortedLastIndex];
            $j = $i - 1;
            //向左移动
            while ($j > 0 && $tmp < $arr[$j-1]) {
                $arr[$j] = $arr[$j-1];
                $j--;
            }
            $arr[$j]=$tmp;

        }
        $sortedLastIndex++;

    }
}
$arr=[4,2,5,1,6,3,0,9];

insertSort($arr);

print_r($arr);

