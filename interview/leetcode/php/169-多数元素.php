<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/13
 * Time: 21:16
 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。

你可以假设数组是非空的，并且给定的数组总是存在多数元素。


链接：https://leetcode-cn.com/problems/majority-element
 *
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $len=count($nums);
        $maxLen=ceil($len/2);
        $arr=[];
        for($i=0;$i<$len;$i++){
            if(!isset($arr[$nums[$i]])){
                $arr[$nums[$i]]=0;
            }
            $arr[$nums[$i]]++;
            if($arr[$nums[$i]]>=$maxLen){
                return $nums[$i];
            }
        }
    }
}
$nums=[2,2,1,1,1,2,2];

$so=new Solution();
echo $so->majorityElement($nums);