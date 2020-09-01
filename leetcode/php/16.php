<?php
/**
https://leetcode-cn.com/problems/3sum-closest

 * 最接近的三数之和
 */
class Solution {

    function threeSumClosest($nums, $target) {
        $len=count($nums);
        if($len<3){
            return array_sum($nums);
        }
        $len=count($nums);
        sort($nums);

        for($i=0;$i<$len-2;$i++){
            $left=$i+1;
            $right=$len-1;
            $sum=$nums[$i]+$nums[$left]+$nums[$right];

            if(!isset($minDiff)){
                $minDiff=abs($sum-$target);
                $ret=$sum;
            }elseif(abs($sum-$target)<$minDiff){
                $minDiff=abs($sum-$target);
                $ret=$sum;
            }
            while($left<$right){
                $sum=$nums[$i]+$nums[$left]+$nums[$right];

                if(abs($sum-$target)<$minDiff){
                    $minDiff=abs($sum-$target);
                    $ret=$sum;
                }
                if($sum>$target){
                    $right--;
                }elseif($sum<$target){
                    $left++;
                }else{
                    return $nums[$i]+$nums[$left]+$nums[$right];
                }
            }


        }
        return $ret;

    }
}

$so=new Solution();

$tests=[
//    [[-1,2,1,-4],1],
    [[1,1,1,0],-100],
];
foreach ($tests as $nums){
    $r=$so->threeSumClosest($nums[0],$nums[1]);

    print_r($r);
}


