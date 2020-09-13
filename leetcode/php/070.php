<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/5
 * Time: 22:55
 * 趴楼梯
 */


/**
 * @param Integer $n
 * @return Integer
 */
function climbStairs($n) {
    if($n<=2){
        return $n;
    }
    $f0=1;
    $f1=2;
    for($i=2;$i<$n;$i++){
        $fn=$f1+$f0;
        $f0=$f1;
        $f1=$fn;

    }
    return $fn;
}

/**
 *  动态规划方式
 */
function climbStairsDp($n){
    $dp[1]=1;
    $dp[2]=2;
    for($i=3;$i<=$n;$i++){
        $dp[$i]=$dp[$i-1]+$dp[$i-2];
    }
    return $dp[$n];
}

$r=climbStairsDp(10);
echo $r;
