<?php
/**
https://leetcode-cn.com/problems/3sum/

 * 三数之和
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     *
     * 暴力破解
     */
    function threeSum($nums) {
        $len=count($nums);
        if($len<3){
            return [];
        }
        $len=count($nums);
        sort($nums);
        echo join(',',$nums).PHP_EOL;
        echo PHP_EOL;
        $ret=[];
        $right=$len-1;

        for($i=0;$i<$len;$i++){
            if($nums[$i]>0){
                return $ret;
            }
            if($i>=1 && $nums[$i]==$nums[$i-1]){
                continue;
            }
            $left=$i+1;
            while($left<$right){

                $sum=$nums[$i]+$nums[$left]+$nums[$right];
                echo "i=".$i."  left=".$left."  right=".$right."              ".$nums[$i].",".$nums[$left].",".$nums[$right]."=".$sum.PHP_EOL;
                if($sum == 0){
                    if(  $left>$i+1 && $nums[$left] ==$nums[$left-1]){
                        $left++;
                        continue;
                    }
                    if( $right<$len-1 && $nums[$right] ==$nums[$right+1] ){
                        $right--;
                        continue;
                    }
                    $ret[]=[$nums[$i],$nums[$left],$nums[$right]];
                    $left++;
                }elseif ($sum<0){
                    $left++;
                }else{
                    $right--;
                }
            }

        }
        return $ret;
    }
}

$so=new Solution();

;
$tests=[
    [-1,0,1,2,-1,-4],
    [0,0,0,0],
    [-4,-2,-2,-2,0,1,2,2,2,3,3,4,4,6,6],//[[-4,-2,6],[-4,0,4],[-4,1,3],[-4,2,2],[-2,-2,4],[-2,0,2]]

];
foreach ($tests as $nums){
    $r=$so->threeSum($nums);

    print_r($r);
}


