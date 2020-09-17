<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/17
 * Time: 23:05
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function rob($nums) {
    $len=count($nums);
    $dp=[];
    $max=0;
    for($i=$len-1;$i>=0;$i--){
        if($i+2>$len-1){
            $dp[$i]=$nums[$i];
        }else{
            if($i+3<=$len-1){
                $rightMax=max($dp[$i+2],$dp[$i+3]);
            }else{
                $rightMax=$dp[$i+2];
            }

            $dp[$i]=$rightMax+$nums[$i];
        }
        $max=max($max,$dp[$i]);
    }
    return $max;
}
$tests=[
    [2,7,9,3,1],
    [2,1,1,2]
];
foreach ($tests as $t){
    echo rob($t).PHP_EOL;
}

