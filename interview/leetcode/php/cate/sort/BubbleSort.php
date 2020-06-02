<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/2
 * Time: 22:42
 * 冒泡排序
 */


function BubbleSort($arr)
{
    $len = count($arr);
    while ($len > 1) {
        $changed = false;
        for ($i = 0; $i < $len - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $tmp;
                $changed = true;
            }
        }
        if (!$changed) {
            return $arr;
        }
        $len--;

    }
    return $arr;

}

$tests = [
    [1, 8, 7, 3, 5, 4],
    [1, 0, 0, 3, 4, 1, 7, 5, 3, 2],
    [1, 2, 3, 4, 5, 6]

];
foreach ($tests as $t) {
    echo join(',', $t) . "->" . join(',', BubbleSort($t)) . PHP_EOL;
}