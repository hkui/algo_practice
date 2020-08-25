<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/25
 * Time: 23:41
 */

class Solution {
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums = array();
        while (!empty($nums1) && !empty($nums2)) {
            if ($nums1[0] < $nums2[0]) {
                $nums[] = array_shift($nums1);
            } else {
                $nums[] = array_shift($nums2);
            }
        }

        while (!empty($nums1)) {
            $nums[] = array_shift($nums1);
        }

        while (!empty($nums2)) {
            $nums[] = array_shift($nums2);
        }

        $count = count($nums);
        if ($count % 2 == 1) {
            return $nums[$count / 2];
        } else {
            $mid = $count / 2;
            return ($nums[$mid] + $nums[$mid - 1]) / 2;
        }
        return -1;
    }
}

$result = new Solution();

$nums1 = [1,70];
$nums2 = [3, 4];

print_r($result->findMedianSortedArrays($nums1, $nums2));