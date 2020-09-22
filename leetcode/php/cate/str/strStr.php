<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/22
 * Time: 23:34
 *
 * 字符串匹配算法
 *
 */

class strStr
{
    /**
     * @param $haystack
     * @param $needle
     * 暴力破解法
     */
    public static function BF($haystack, $needle)
    {
        $len1 = strlen($haystack);
        $len2 = strlen($needle);
        if ($len2 == 0) return 0;
        if ($len1 < $len2) return -1;
        if ($len1 == $len2) {
            if ($haystack != $needle) {
                return -1;
            }
            return 0;

        }
        $i = 0;
        $j = 0;
        while ($i < $len1 && $j < $len2) {
            if ($haystack{$i} == $needle{$j}) {
                //提前退出条件
                //abc
                // bcd
                if ($len1 - $i < $len2 - $j) {

                    return -1;
                }
                $i++;
                $j++;
            } else {
                //j直接回退到开头，i到上次开始比较的下一位
                /**
                 * abcebd
                 *  bcd
                 */
                $i = $i - $j + 1;
                $j = 0;
            }
        }
        //  abcd
        //   bc
        if ($j == $len2) {
            return $i - $j;
        }
        return -1;

    }

    //Sunday 匹配
    public static function sunday($haystack, $needle)
    {

    }
}

$tests = [
    ["mississippi", "issip"]
];
foreach ($tests as $t) {
    echo strStr::BF($t[0], $t[1]);
}

