<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/7/25
 * Time: 9:20
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $left = $right = -1;
        $len = count($nums);
        $i = 0;
        $j = $len - 1;
        while ($i <=$j) {
            $mid = intval(($i + $j) / 2);
            if ($nums[$mid] < $target) {
                $i = $mid + 1;
            } else if($nums[$mid] > $target) {
                $j = $mid - 1;
            } else {
                if($mid<$j){
                    if ($target == $nums[$mid + 1]) {
                        for ($k = $mid + 1; $k <= $j; $k++) {
                            if ($nums[$k] != $target) {
                                break;
                            }else{
                                $right=$k;
                            }
                        }
                    }else{
                        $right=$mid;
                    }
                }else{
                    $right=$mid;
                }

                if($mid>$i){
                    if ($nums[$mid - 1] == $target) {
                        for ($k = $mid - 1; $k >= $i; $k--) {
                            if ($nums[$k] != $target) {
                                break;
                            }else{
                                $left=$k;
                            }
                        }
                    }else{
                        $left=$mid;
                    }
                }else {
                    $left = $mid;
                }
                break;
            }

        }
        return [$left, $right];
    }
}

$so = new Solution();


$tests=[
    [[5,7,7,8,8,10],8],
    [[1, 3, 5, 5,5, 7, 9],5]

];
foreach ($tests as $t){
    $r = $so->searchRange($t[0], $t[1]);
    print_r($r);
}
