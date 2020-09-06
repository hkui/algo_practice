<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/6
 * Time: 23:54
 *
 * 接雨水
 */

/**
 * @param Integer[] $height
 * @return Integer
 * 暴力破解法 击败10.66%

 */
function trap($height) {
    $len=count($height);
    $ans=0;
    for($i=1;$i<$len-1;$i++){
        $max_left=0;
        $max_right=0;
        for($j=$i;$j>=0;$j--){
            $max_left=max($max_left,$height[$j]);
        }
        for($j=$i;$j<$len;$j++){
            $max_right=max($max_right,$height[$j]);
        }
        $ans+=min($max_left,$max_right)-$height[$i];

    }
    return $ans;
}
$tests=[
    [0,1,0,2,1,0,1,3,2,1,2,1]
];
foreach ($tests as $t){
    echo trap($t);
}