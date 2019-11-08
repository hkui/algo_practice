<?php

/**
 * https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 */
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $max = 0;
        $arr = [];
        $left = $right = 0;
        $len = strlen($s);

        while ($left < $len && $right < $len) {
            //没在已经遍历的集合里
            if (!in_array($s[$right], $arr)) {
                $arr[] = $s[$right];
                $right++;

            } else {
                //在已经考察的集合里
                $index = array_search($s[$right], $arr);
                for ($i = $left; $i <= $index; $i++) {
                    unset($arr[$i]);
                }
                $arr[] = $s[$right];
                $right++;
                $left = $index + 1;


            }
            $max = max($max, count($arr));
        }
        return $max;
    }
}



