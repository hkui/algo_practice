<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/10
 * Time: 22:25
 */

/**
 * @param Integer[] $nums
 * @param Integer $val
 * @return Integer
 */
function removeElement(&$nums, $val) {
    $len=count($nums);

    $i=0;
    for($j=0;$j<$len;$j++){
       if($nums[$j]!=$val){
           #echo $i."-".$j.PHP_EOL;
           $nums[$i]=$nums[$j];
           $i++;
       }
    }
    return $i;

}

$nums = [0,1,2,2,3,0,4,2];
$val = 2;
echo removeElement($nums,$val);

