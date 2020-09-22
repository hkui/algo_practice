<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/22
 * Time: 23:12
 */

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLastWord($s) {
    $len=strlen($s);
    $count=0;
    for($i=$len-1;$i>=0;$i--){
        if($s{$i}==' '){
            if($count==0){
                continue;
            }
            return $count;
        }else{
            $count++;
        }
    }
    return $count;
}

$s="hello word ";
echo lengthOfLastWord($s);
