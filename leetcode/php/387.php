<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/18
 * Time: 23:51
 */

/**
 * @param String $s
 * @return Integer
 */
function firstUniqChar($s) {
    $dict=[];
    $len=strlen($s);
    for($i=0;$i<$len;$i++){
        $dict[$s{$i}]=$i;
    }
    for($i=0;$i<$len;$i++){
        $str=$s{$i};
        if(isset($dict[$str]) && $dict[$str]==$i){
            return $i;
        }
        unset($dict[$str]);
    }
    return -1;

}

$s = "loveleetcode";
$s="aa";
echo firstUniqChar($s);