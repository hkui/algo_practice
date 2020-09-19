<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/20
 * Time: 1:29
 */

/**
 * @param String $s
 * @return Boolean
 */
function isPalindrome($s) {
    $s=strtolower($s);
    $len=strlen($s);
    $i=0;
    $j=$len-1;

    while($i<$j){
        if(!is_numeric($s{$i}) && !isaz($s{$i})){
            $i++;
            continue;
        }

        if(!is_numeric($s{$j}) && !isaz($s{$j})){
            $j--;
            continue;
        }
        if($s{$i} !=$s{$j}){
            return false;
        }
        $i++;
        $j--;
    }
    return true;
}


function isaz($str){
    if($str>='a' && $str<='z'){
        return true;
    }
    return false;
}
#var_dump(isaz(','));

$str="A man, a plan, a canal: Panama";

$r=isPalindrome($str);
var_dump($r);
