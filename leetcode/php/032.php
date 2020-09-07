<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/7
 * Time: 19:45
 */

function longestValidParentheses($s)
{
    $len = strlen($s);
    if ($len < 2) {
        return 0;
    }
    $stack = [];
    array_push($stack, -1);
    $max = 0;
    for ($i = 0; $i < $len; $i++) {
        $item = $s{$i};
        if ($item == '(') {
            array_push($stack, $i);
        } else {
            if (!empty($stack) && end($stack) != -1 && $s{end($stack)} == '(') {
                array_pop($stack);
                #echo "item=" . $item . ";i=" . $i . "; end=" . end($stack) . PHP_EOL;
                $lenTmp = $i - end($stack);
                $max = max($lenTmp, $max);
            } else {
                array_push($stack, $i);
            }
        }

    }
    return $max;
}


$tests = [
    "))))) ((( () (",

    ")()())()()(",

//    '()()',
//    ") ()() )",

//    '())(())',
//    '(()(',
//    '((())(',
//    ') () ) (()) ( ()() ）'


];
foreach ($tests as $s) {
    $s = preg_replace('#\s*#', '', $s);
//    echo $s;
    echo longestValidParentheses($s) . PHP_EOL;
}
