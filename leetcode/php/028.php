<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/19
 * Time: 0:08
 */

class Solution
{

    /**
     * 暴力匹配
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */

    function strStr($haystack, $needle)
    {
        $len1 = strlen($haystack);
        $len2 = strlen($needle);
        $i = 0;
        $j = 0;

        while ($i < $len1 && $j < $len2) {
            if ($needle{$j} == $haystack{$i}) {
                //提前退出条件
                //abc
                // bcd
                if($len1-$i<$len2-$j){
                    return -1;
                }
                $i++;
                $j++;
            } else {
                $i=$i-$j+1;
                $j = 0;
            }

        }
        if ($j == $len2) {
            return $i - $j;
        }
        return -1;
    }
    //Sunday 匹配
    public function sunday($haystack, $needle)
    {
        $len1 = strlen($haystack);$len2 = strlen($needle);
        if($len1<$len2 || ($len1==$len2 && $haystack!=$needle) ){
            return -1;
        }
        $i = 0;$j = 0;
        while ($i < $len1 && $j < $len2) {
            if ($needle{$j} == $haystack{$i}) {
                if ($j == 0) {
                    $beginIndex = $i;
                }
                $i++;
                $j++;
            } else {
                $j=0;
                if (isset($beginIndex)) {
                    $nextStart = $beginIndex+$len2;
                    unset($beginIndex);
                } else {
                    $nextStart=$i+$len2;
                }
                if($nextStart>$len1-1){
                    return -1;
                }
                //查看i处这个元素是否在模式串里,从后往前
                for($k=$len2-1;$k>=0;$k--){
                    if($haystack{$nextStart}==$needle{$k}){
                        break;
                    }
                }

                if($k>=0){
                    $i=$nextStart-$k;
                }else{
                    $i=$nextStart;
                }

            }

        }
        if ($j == $len2) {
            return $i - $j;
        }
        return -1;

    }
}

$tests = [
    ["hello", "lo"],
//    ["mississippi", "issipi"],
//    ["aaaaa","bba"],
];
$so = new Solution();
foreach ($tests as $t) {
    echo $so->sunday($t[0], $t[1]) . PHP_EOL;
}

