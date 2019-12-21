<?php
/**
https://leetcode-cn.com/problems/two-sum/
 */



class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {

        $len=count($nums);
        $set=[];
		foreach ($nums as $k=>$v){
		    $another=$target-$v;
		    
		    if(isset($set[$another])){
		    	return [$set[$another],$k];
		    }else{
		    	$set[$v]=$k;
		    }
		   
		}
    }
}
$s=new Solution();
$nums=[1,3,9,7];
$target=10;

$r=$s->twoSum($nums,$target);
print_r($r);

