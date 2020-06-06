<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/6
 * Time: 22:43
 */
function mergeSort(&$arr,$i,$j){
    if($i>=$j){
        return;
    }
    $mid=intval(($i+$j)/2);
    mergeSort($arr,$i,$mid);
    mergeSort($arr,$mid+1,$j);
    merge($arr,$i,$j);


}
function merge(&$arr,$i,$j){
    $mid=intval(($i+$j)/2);
    $res=[];
    $m=$i;
    $n=$mid+1;
    while ($m<=$mid && $n<=$j){
        if($arr[$m]<$arr[$n]){
            $res[]=$arr[$m];
            $m++;
        }elseif($arr[$n]<$arr[$m]){
            $res[]=$arr[$n];
            $n++;
        }else{
            $res[]=$arr[$m];
            $res[]=$arr[$m+1];
            $m++;
            $n++;
        }

    }
    while($m<=$mid){
        $res[]=$arr[$m++];
    }
    while($n<=$j){
        $res[]=$arr[$n++];
    }
    foreach ($res as $index=>$r){
        $arr[$i+$index]=$res[$index];
    }
    unset($res);
}
$arr=[4,2,5,1,6,3,0,9];
$arr=[6,5,4,3,2,1,0];
mergeSort($arr,0,count($arr)-1);
print_r($arr);