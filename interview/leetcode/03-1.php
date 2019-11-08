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
    //pwwkew
    function lengthOfLongestSubstring($s)
    {
        $max = 0;
        $arr = [];
        $left = $right = 0;
        $len = strlen($s);

        while ($left < $len && $right < $len) {
            $key=$s[$right];
            //没在已经遍历的集合里
            if(!isset($arr[$key])){
                $arr[$key]=$right++;
            } else {
                //在已经考察的集合里
                for ($i = $left; $i <= $arr[$key]; $i++) {
                    unset($arr[$i]);
                }
                $left = $arr[$key] + 1;
                $arr[$key] = $right;
                $right++;

            }
            $max = max($max, count($arr));
        }
        return $max;
    }
}



