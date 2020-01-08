<?php
/**
 * 下一个排列
 * https://leetcode-cn.com/problems/next-permutation/
 *
 * https://blog.csdn.net/HappyRocking/article/details/83619392
 *
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        $len=count($nums);
        $m=$n=-1;
        for($i=$len-2;$i>=0;$i--){
            if($nums[$i]<$nums[$i+1]){
                $m=$i;
                break;
            }
        }
        if($m!=-1){
            for($j=$len-1;$j>$i;$j--){
                if($nums[$j]>$nums[$m]){
                    $n=$j;
                    break;
                }
            }
            $tmp=$nums[$m];
            $nums[$m]=$nums[$n];
            $nums[$n]=$tmp;
            //反转$m之后的数组

            $x=$m+1;
            $y=$len-1;
            while($x<$y){
                $tmp=$nums[$x];
                $nums[$x++]=$nums[$y];
                $nums[$y--]=$tmp;
            }
        }else{
            sort($nums);
        }
    }
}

$so=new Solution();
$nums=[1,2,3];
$nums=[3,2,1];
$nums=[1,1,5];

$nums=[1,3,2];
$nums=[5,4,7,5,3,2];

$so->nextPermutation($nums);

print_r($nums);
