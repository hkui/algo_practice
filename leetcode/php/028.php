<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/19
 * Time: 0:08
 */


/**
 * @param String $haystack
 * @param String $needle
 * @return Integer
 */
function mstrStr($haystack, $needle) {
    $len1=strlen($haystack);
    $len2=strlen($needle);
    $i=0;
    $j=0;

    while($i<$len1 && $j<$len2){
        if($needle{$j}==$haystack{$i}){
            if($j==0){
                $beginIndex=$i;
            }
            $i++;
            $j++;
        }else{
            if(isset($beginIndex)){
                $i=$beginIndex+1;
            }else{
                $i++;
            }

            $j=0;
        }

    }
    if($j==$len2){
        return $i-$j;
    }
    return -1;


}

$haystack = "hello";
$needle = "lo0";
echo mstrStr($haystack,$needle);
