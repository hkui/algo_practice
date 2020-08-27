<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/27
 * Time: 22:25
 */

function selectSort(&$arr){
    $len=count($arr);

    for($i=0;$i<$len;$i++){
        $min_index=$i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$min_index]>$arr[$j]){
                $min_index=$j;
            }
        }
        if($i!=$min_index){
            $tmp=$arr[$min_index];
            $arr[$min_index]=$arr[$i];
            $arr[$i]=$tmp;
        }
    }

}
$arr=[4,2,5,1,6,3,0,9];
selectSort($arr);
print_r($arr);