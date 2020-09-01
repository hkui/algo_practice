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
        $set=[];
		foreach ($nums as $k=>$v){
		    $another=$target-$v;
		    if(isset($set[$another])){
		    	return [$set[$another],$k];
		    }
            $set[$v]=$k;

		}
    }
}
$s=new Solution();

$tests=[
    ['nums'=>[1,3,9,7],'target'=>10],


];

foreach ($tests as $t){
    $r=$s->twoSum($t['nums'],$t['target']);
    print_r($r);
}



