<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/9
 * Time: 22:24
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums)
    {
        $len = count($nums);
        $left = 0;
        $right = $len - 1;
        $i = 0;
        while ($left <= $right) {
            if ($nums[$i] == 2) {
                $this->swap($nums, $i, $right);
                $right--;
            } elseif ($nums[$i] == 0) {
                $this->swap($nums, $i, $left);
                $left++;
                //注意i不能小于left
                if ($i < $left) {
                    $i++;
                }

            } elseif ($nums[$i] == 1) {
                $i++;
            }
            if ($i > $right) {
                break;
            }
        }
    }

    function swap(&$arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}

$arr = [2, 0, 2, 1, 1, 0];
//$arr=[2,0,1];

$so = new Solution();
$so->sortColors($arr);
print_r($arr);