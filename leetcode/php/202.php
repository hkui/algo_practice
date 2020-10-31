<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/31
 * Time: 17:28
 */


class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n) {
        $cycles=[4, 16, 37, 58, 89, 145, 42, 20];
        while($n!=1 && !in_array($n,$cycles)){
            $n=$this->get_next($n);
        }
        return $n==1;


    }
    function get_next($num){
        $n=0;
        while ($num){
            $t=$num%10;
            $num=intval($num/10);
            $n+=$t*$t;
        }
        return $n;
    }

}
$so=new Solution();
echo  $so->isHappy(19);