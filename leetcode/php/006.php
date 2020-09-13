<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/13
 * Time: 16:37
 */

/**
 * @param String $s
 * @param Integer $numRows
 * @return String
 */
function convert($s, $numRows)
{
    $arr = [];
    $len = strlen($s);
    for ($y = 0; $y < $numRows; $y++) {
        $arr[$y] = '';
    }
    for ($y = 0, $i = 0; $i < $len; $i++) {
        $arr[$y] .= $s{$i};
        if ($y == $numRows - 1) {
            $down = 0;
        }
        if ($y == 0) {
            $down = 1;
        }

        if ($down == 1) {
            $y++;
        } else {
            $y--;
        }
    }
    return join('', $arr);
}

$s = "ab";
echo convert($s, 2);


