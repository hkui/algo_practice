<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/2
 * Time: 21:58
 */
//暴力破解法

/**
 * abccbca
 * 选1个起点，1个终点位置
 *
 */
class Solution
{
    //暴力破解法
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) {
            return $s;
        }
        $maxLen = 1;
        $resstr = $s{0};
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                $testLen = $j - $i + 1;

                if ($testLen > $maxLen && $this->isPalindrome($s, $i, $j)) {
                    $resstr = substr($s, $i, $j - $i + 1);
                    $maxLen = $testLen;
                }
            }

        }
        return $resstr;
    }

    public function isPalindrome($s, $i, $j)
    {
        while ($i < $j) {
            if ($s{$i} != $s{$j}) {
                return false;
            }
            $i++;
            $j--;
        }
        return true;
    }

}

$s = new Solution();

$tests = [
    'abbacab',
    'babad',
    'ac'
];
foreach ($tests as $str) {
    $r = $s->longestPalindrome($str);
    echo $r . PHP_EOL;
}


