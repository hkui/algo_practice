<?php
/**
 * Created by PhpStorm.
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
        if($x%10==0 && $x!=0){
            return false;
        }
        
       $revertnum=0;
       while($x>$revertnum){
            $pop=$x%10;
            $x=intval($x/10);
            $revertnum=$revertnum*10+$pop;

       }
       if($x==$revertnum || ($x==intval($revertnum/10))){
            return true;
       }

       return false;
    }

   
}

$s=new Solution();

var_dump($s->isPalindrome(12321));