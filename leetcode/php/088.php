<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return void
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        if ($m == 0) {
            $nums1 = $nums2;
            return;
        }
        $i = $n - 1; //nums2的指针
        $j = $m - 1;  //nums1的指针
        $p = $m + $n - 1;

        while ($i >= 0 && $j >= 0) {
            if ($nums2[$i] > $nums1[$j]) {
                $nums1[$p] = $nums2[$i];
                $i--;
            } else {
                $nums1[$p] = $nums1[$j];
                $j--;
            }
            $p--;
        }
        while ($i >= 0) {
            $nums1[$p] = $nums2[$i];
            $i--;
            $p--;
        }
        while ($j >= 0) {
            $nums1[$p] = $nums1[$j];
            $j--;
            $p--;
        }
    }
}

$nums1 = [1, 3, 5, 0, 0];
$nums2 = [2, 7];

$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];

$nums1 = [0];
$nums2 = [1];

$nums1 = [2, 0];
$nums2 = [1];
$s = new Solution();
$s->merge($nums1, count(array_filter($nums1)), $nums2, count($nums2));
print_r($nums1);