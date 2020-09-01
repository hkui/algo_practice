<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/7/25
 * Time: 22:36
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        $len=count($nums);
        //把i放在i-1位置
        for($i=0;$i<$len;$i++){
            $num=$nums[$i];

            //把num放在索引num-1的位置
            if($num>=1 && $num<=$len &&  $num!=$i+1 && $nums[$num-1]!=$num){
                $tmp=$nums[$num-1];
                $nums[$num-1]=$num;
                if($tmp>=1 ){
                    $nums[$i]=$tmp;
                    //当前i索引的值手否是$i+1,不是的话，把它放到符合的位置上
                    while($nums[$i]<=$len && $nums[$i]!=$i+1 &&  $nums[$nums[$i]-1]!=$nums[$i]){
                        $ttmp=$nums[$nums[$i]-1];
                        $nums[$nums[$i]-1]=$nums[$i];
                        $nums[$i]=$ttmp;
                    }


                }
            }
        }
        for($i=0;$i<$len;$i++){
            if($nums[$i]!=$i+1){
                return $i+1;
            }
        }
        return $i+1;
    }
}
$so=new Solution();

$tests=[
//    [1,2,0],
//    [3,4,-1,1],
//    [7,8,9,11,12],
//    [],
//    [1],
    [3,-1,23,7,21,12,8,9,18,21,-1,16,1,13,-3,22,23,13,7,14]
];
foreach ($tests as $t){
    echo $so->firstMissingPositive($t).PHP_EOL;
}