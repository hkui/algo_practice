<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/19
 * Time: 0:35
 */

function getString($s) {
    $len = strlen($s);
    $res = array();
    $r = array();
    for ($i = 0; $i < $len; $i++) {
        if (in_array($s[$i], $r)) {
            $r = array_slice($r, array_search($s[$i], $r) + 1);
        }
        $r[] = $s[$i];
        if (count($r) > count($res)) {
            $res = $r;
        }
    }
    return implode('', $res);
}

$str = 'abcab';

print_r(getString($str));