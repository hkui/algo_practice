<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/23
 * Time: 23:23
  给定String类型的数组strArr，再给定整数k，请严格按照出现顺序打印出现出现次数前k名的字符串。
 strArr=["1","3","3","4","1","5","1"],
 k=3
 * No.1:    1,times:3
 * No.2:    3,times:2
 * No.3:    4,times:1
 要求：如果strArr长度为N，时间复杂度请达到O(Nlogk)
 */

function sortK($strArr,$k=1){
    $dict=[];
    foreach ($strArr as $v){
        if(!isset($dict[$v])){
            $dict[$v]=1;
        }else{
            $dict[$v]++;
        }
    }
    $sortArr=[];

    arsort($dict);
    $sort=1;
    foreach ($dict as $num=>$cnt){
        if($sort>$k){
            break;
        }
        $sortArr[$num]=$sort;
        $sort++;
    }
    $ret=[];
    foreach ($strArr as $v){
        if(isset($sortArr[$v]) &&!isset($ret[$v])){
            $ret[$v]=$sortArr[$v];
        }
    }
    return $ret;

}

$strArr = ["1",'4', "3", "3", "3", "3", "4", "1", "5", "1"];
$r=sortK($strArr,3);
print_r($r);
