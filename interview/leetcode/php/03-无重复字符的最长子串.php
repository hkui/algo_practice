<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/29
 * Time: 16:42
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    //abbacade
    function lengthOfLongestSubstring($s) {
        $left=0;
        $len=strlen($s);
        $max=0;
        $processed=[];//已经遍历过的元素的最大索引值
        for($i=0;$i<$len;$i++){
            $item=$s{$i};
            if(isset($processed[$item])){
                if($processed[$item]+1>$left){
                    $left=$processed[$item]+1;
                }

            }
            $nowMax=$i-$left+1;
            $max=max($nowMax,$max);
            $processed[$item]=$i;
        }
        return $max;
    }
}
$so=new Solution();
$tests=[
    "abbacade",
    "abba"
];
foreach ($tests as $t){
    echo $so->lengthOfLongestSubstring($t).PHP_EOL;
}
