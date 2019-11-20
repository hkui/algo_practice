<?php
/**
 * Created by PhpStorm.
 * User: huangkui@lepu.cn
 * Date: 2019/11/20
 * Time: 9:06
 */

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x<0){
            return false;
        }
        if($x>=0 && $x<10){
            return true;
        }
        if(!$x%10){
            return false;
        }
        if($x!=$this->reverse($x)){
            return false;
        }
        return true;
    }

    function reverse($x) {

        $rev=0;
        while($x!=0){
            $pop=$x%10;
            $x=intval($x/10);
            $rev=$rev*10+$pop;

        }
        return $rev;

    }
}

$s=new Solution();

var_dump($s->isPalindrome(123321));