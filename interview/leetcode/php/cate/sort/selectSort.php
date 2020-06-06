<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/6
 * Time: 22:26
 */

function selectSort(&$arr){
    $len=count($arr);

    for($i=0;$i<$len;$i++){
        $min_index=$i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$j]<$arr[$min_index]){
                $min_index=$j;
            }
        }
        if($min_index!=$i){
            $tmp=$arr[$min_index];
            $arr[$min_index]=$arr[$i];
            $arr[$i]=$tmp;
        }

    }

}
$arr=[4,2,5,1,6,3,0,9];
selectSort($arr);
print_r($arr);