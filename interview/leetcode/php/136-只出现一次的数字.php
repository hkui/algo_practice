<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/31
 * Time: 22:23
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber1($nums)
    {
        $arr = [];
        foreach ($nums as $n) {
            if (!isset($arr[$n])) {
                $arr[$n] = 1;
            } else {
                $arr[$n] = 0;
            }
        }
        $arr = array_filter($arr);

        return (current(array_keys($arr)));

    }

    function singleNumber($nums)
    {
        $i=0;
        foreach ($nums as $num){
            $i=$i^$num;
        }
        return $i;

    }
}

$so = new Solution();
$nums = [1, 2, 3, 5, 2, 3, 1];

echo $so->singleNumber($nums);
