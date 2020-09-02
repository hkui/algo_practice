<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/2
 * Time: 23:00
 */

class Solution
{
    //中心扩展法
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) {
            return $s;
        }
        $max=0;
        for($i=0;$i<$len-1;$i++){
            $len1=$this->expandAroundCenter($s,$i,$i);
            $len2=$this->expandAroundCenter($s,$i,$i+1);
            $maxLen=max($len1,$len2);

            if($maxLen>$max){
                $start=$i-intval(($maxLen-1)/2);
                $max=$maxLen;
            }
        }
        return substr($s,$start,$max);

    }
    function expandAroundCenter($s,$left,$right){
        $len=strlen($s);
        while($left>=0 && $right<$len && $s{$left}==$s{$right}){
                $left--;
                $right++;

        }
        return $right-$left-1;
    }

}
$s = new Solution();

$tests = [
//    'aba',
    "cbbd"
//    'abbacab',
//    'babad',
//    'ac'
];
foreach ($tests as $str) {
    $r = $s->longestPalindrome($str);
    echo $r . PHP_EOL;
}
