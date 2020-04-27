<?php
/**
https://leetcode-cn.com/problems/3sum/

 * 三数之和
 */
class Solution {

    function threeSum($nums) {
        $len=count($nums);
        if($len<3){
            return [];
        }
        $len=count($nums);
        sort($nums);
        #echo join(',',$nums).PHP_EOL;
        $ret=[];

        for($i=0;$i<$len;$i++){

            if($nums[$i]>0){
                return $ret;
            }
            if($i>=1 && $nums[$i]==$nums[$i-1]){
                continue;
            }
            $left=$i+1;
            $right=$len-1;
            while($left<$right){
                $sum=$nums[$i]+$nums[$left]+$nums[$right];
                echo "i=".$i."  left=".$left."  right=".$right."            ".$nums[$i].",".$nums[$left].",".$nums[$right]."=".$sum.PHP_EOL;
                if($sum == 0){
                    $ret[]=[$nums[$i],$nums[$left],$nums[$right]];
                    while($left<$right && $nums[$left]==$nums[$left+1]){
                        $left++;
                    }
                    while($left<$right && $nums[$right]==$nums[$right-1]){
                        $right--;
                    }
                    $left++;
                    $right--;

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

$tests=[
//    [-1,0,1,2,-1,-4],
//    [0,0,0,0],
    [-4,-2,-2,-2,0,1,2,2,2,3,3,4,4,6,6],//[[-4,-2,6],[-4,0,4],[-4,1,3],[-4,2,2],[-2,-2,4],[-2,0,2]]

];
foreach ($tests as $nums){
    $r=$so->threeSum($nums);

    print_r(d($r));
}
function d($arr){
    foreach ($arr as $k=>$v){
        $arr[$k]=implode(' ',$v);
    }
    return $arr;
}

