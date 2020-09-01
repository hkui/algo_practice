<?php
/**
 * Class Solution
 * 摆动排序 II
 * https://leetcode-cn.com/problems/wiggle-sort-ii/
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function wiggleSort(&$nums) {
        sort($nums);
        $len=count($nums);
        $right=count($nums)-1;
        $mid=$len%2==0 ?$len/2-1:($len-1)/2;
        $cur=$mid;
        while($cur>=0){
            $ret[]=$nums[$cur];
            if($right ==$mid){
                break;
            }

            $ret[]=$nums[$right];
            $cur--;
            $right--;
        }

        $nums=$ret;
    }
}

$so=new Solution();

$nums=[1,2,4,0,3,5,6];

$nums=[1,5,1,1,6,4];
//$nums=[1,3,2,2,3,1];

$so->wiggleSort($nums);
print_r($nums);



