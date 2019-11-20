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
        
        $div=1;
        while($x>10*$div) {
            $div*=10;
        }
        while($x>0){
            $left=intval($x/$div);
            $right=$x%10;
            if($left!=$right){
                return false;
            }
            $x=intval(($x%$div)/10);
            $div=$div/100;
        }
        return true;
    }

   
}

$s=new Solution();

var_dump($s->isPalindrome(10));