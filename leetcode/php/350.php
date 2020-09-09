<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/9
 * Time: 10:35
 */

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
//哈希记录数
function intersect($nums1, $nums2) {
    $set=[];
    $ret=[];
    foreach ($nums1 as $k=>$v){
        if(empty($set[$v])){
            $set[$v]=1;
        }else{
            $set[$v]++;
        }
    }

    foreach ($nums2 as $v){
        if(isset($set[$v]) && $set[$v]>0){
            $ret[]=$v;
            $set[$v]--;
        }
    }
    return $ret;
}
//如果已经有序，双指针
function intersect1($nums1, $nums2) {
    sort($nums1);
    sort($nums2);
    $ret=[];
    $len1=count($nums1);
    $len2=count($nums2);
    $i=$j=0;
    while($i<$len1 && $j<$len2){
        if($nums1[$i]==$nums2[$j]){
            $ret[]=$nums1[$i];
            $i++;
            $j++;
        }elseif ($nums1[$i]<$nums2[$j]){
            $i++;
        }else{
            $j++;
        }
    }
    return $ret;
}

$tests=[
    [[4,9,5],[9,4,9,8,4]],
    [[1,2,2,1],[2,2]],
    [[3,1,2],[1,1]],

];
foreach ($tests as $v){
    $r=intersect1($v[0],$v[1]);
    print_r($r);
}
