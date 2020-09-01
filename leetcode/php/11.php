<?php
/**
 *
 * 盛最多水的容器
 * https://leetcode-cn.com/problems/container-with-most-water/
 *
 */
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $len=count($height);
        $i=0;
        $j=$len-1;
        $maxArea=[];
        while($i<$j){
            $vi=$height[$i];
            $vj=$height[$j];
            $maxArea[]=($j-$i)*min($vi,$vj);
            if($vi<$vj){
                $i++;
            }elseif ($vi>$vj){
                $j--;
            }else{
                $i++;
            }
        }
        return max($maxArea);
    }
}

$so=new Solution();
$height=[1,8,6,2,5,4,8,3,7];
echo $so->maxArea($height);



