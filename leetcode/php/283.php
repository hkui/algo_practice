<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/5
 * Time: 20:44
 * 移动零
 */

class Solution
{
    //最优解
    function moveZeroes1(&$nums)
    {
        $len = count($nums);
        $j=0;
        for($i=0;$i<$len;$i++){
            if($nums[$i]!=0){
                if($i>$j){
                    $nums[$j]=$nums[$i];
                    $nums[$i]=0;
                }
                $j++;
            }
        }
        return $nums;
    }
    //双指针
    function moveZeroes(&$nums)
    {
        $len = count($nums);
        $lastNot0index=0;
        for($i=0;$i<$len;$i++){
            if($nums[$i]!=0){
                $nums[$lastNot0index]=$nums[$i];
                $lastNot0index++;
            }
        }
        for($i=$lastNot0index;$i<$len;$i++){
            $nums[$i]=0;
        }
        return $nums;
    }


}

$so = new Solution();
$nums = [0, 1, 0, 3, 12];
$so->moveZeroes($nums);
print_r($nums);