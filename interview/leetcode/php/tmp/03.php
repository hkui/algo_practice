<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/23
 * Time: 20:19
 */
function lengthOfLongestSubstring($s){
    $len=strlen($s);
    $processed=[];
    $left=0;
    $max=0;
    for($i=0;$i<$len;$i++){
        $item=$s{$i};
        if(isset($processed[$item])){
            if($left<$processed[$item]+1){
                $left=$processed[$item]+1;
            }
        }
        $nowMax=$i-$left+1;
        $max=max($nowMax,$max);
        $processed[$item]=$i;
    }
    return $max;
}

$tests=[
    'ababcad',
    "bbbbb",
    "abcabcbb"
];
foreach ($tests as $s){
    echo lengthOfLongestSubstring($s).PHP_EOL;
}