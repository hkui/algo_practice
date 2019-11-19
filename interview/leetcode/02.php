<?php
/**
https://leetcode-cn.com/problems/two-sum/
 */
$nums=[1,3,9,7];
$target=10;

$len=count($nums);
foreach ($nums as $k=>$v){
    $another=$target-$v;
    $k1=$k;
    for($i=$k+1;$i<$len;$i++){
        if($nums[$i] ==$another){
            $k2=$i;
            echo $k1."--".$k2;
            break 2;
        }
    }
}

