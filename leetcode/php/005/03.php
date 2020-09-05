<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/5
 * Time: 12:52
 * 动态规划的写法
https://leetcode-cn.com/problems/longest-palindromic-substring/solution/zhong-xin-kuo-san-dong-tai-gui-hua-by-liweiwei1419/
 */

class Solution
{
    /**
     * @param $s
     * @return mixed
     * 动态规划写法
     */
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) {
            return $s;
        }
        $dp=[[]];
        //$dp[i][j]表示[i,j]是不是回文
        for($i=0;$i<$len;$i++){
            $dp[$i][$i]=true;
        }
        $maxLen=1;
        $begin=0;
        for($j=1;$j<$len;$j++){

            for($i=0;$i<$j;$i++){

                if($s{$i}!=$s{$j}){
                    //[i,j]的不是回文
                    $dp[$i][$j]=false;
                }else{
                    //依赖的下一个子区间[i+1,j-1],j-1-(i+1)>1才能构成区间 即j-i-3>0
                    //如果构不成区间 就没有后续的了
                    //注意临界条件
                    if($j-$i-3<0){
                        $dp[$i][$j]=true;
                    }else{
                        $dp[$i][$j]=$dp[$i+1][$j-1];
                        //后者之前一定已经得出过结论 [0,j-1]是上一轮的遍历
                        // 所以必须注意填表的顺序
                    }
                }

                if($dp[$i][$j] && $j-$i+1>$maxLen){
                    $maxLen=$j-$i+1;
                    $begin=$i;
                }
            }

        }
        return substr($s,$begin,$maxLen);
    }


}
$s = new Solution();

$tests = [
//    'aba',
//    "cbbd",
//    'abbacab',
//    'babad',
//    'ac',
    '"aaabaaaa"'
];
foreach ($tests as $str) {
    $r = $s->longestPalindrome($str);
    echo $r . PHP_EOL;
}
