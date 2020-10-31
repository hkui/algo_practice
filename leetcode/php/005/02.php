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
        $start=0;
        $end=0;
        for($i=0;$i<$len-1;$i++){
            $len1=$this->expandAroundCenter($s,$i,$i);
            $len2=$this->expandAroundCenter($s,$i,$i+1);
            $nowLen=max($len1,$len2);
            if($nowLen>$end-$start+1){
                $start=$i-intval(($nowLen-1)/2);
                $end=$i+intval($nowLen/2);
            }
        }
        return substr($s,$start,($end-$start)+1);

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
