<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/18
 * Time: 23:43
 */

/**
 * @param String[] $s
 * @return NULL
 */
function reverseString(&$s) {
    $len=count($s);
    $i=0;
    $j=$len-1;
    while($i<$j){
        $tmp=$s[$i];
        $s[$i]=$s[$j];
        $s[$j]=$tmp;
        $i++;
        $j--;

    }

}
$s=["h","e","l","l","o"];
reverseString($s);
print_r($s);
