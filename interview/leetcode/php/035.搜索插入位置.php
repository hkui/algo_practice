<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/29
 * Time: 19:35
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $len=count($nums);
        $left=0;
        $right=$len-1;
        if($target>$nums[$len-1]){
            return $len;
        }
        if($target<$nums[0]){
            return 0;
        }
        while($left<=$right){
            $midIndex=intval(($left+$right)/2);
            if($target>$nums[$midIndex]){
                if($midIndex+1 <=$len && $target<$nums[$midIndex+1]){
                   return $midIndex+1;
                }
                $left=$midIndex+1;
            }elseif($target<$nums[$midIndex]){
                if($midIndex-1>=0 && $target >$nums[$midIndex-1]){
                    return $midIndex;
                }
                $right=$midIndex-1;
            }else{
                return $midIndex;
            }

        }
    }

}

$tests=[
    [[1,2,3,4,6,10,12,20],7],
    [[1,3,5,7,9],4],
    [[1,3,5,6],7]

];
$so=new Solution();

foreach ($tests as $t){
    echo $so->searchInsert($t[0],$t[1]).PHP_EOL;
}
