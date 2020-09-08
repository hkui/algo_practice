<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/8
 * Time: 22:26
 */

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s)
{
    $len=strlen($s);
    $left=0;
    $max=0;
    $processed=[];
    for($i=0;$i<$len;$i++){
        $str=$s{$i};
        if(isset($processed[$str])){
            //abcba ,第一次到b,left为第一个b的下一个即为c，索引为2
            //第二次到a 因为第一a的下一个为第一个b,索引为1，因为之前的left已经是2 大于1，应该取较后者
            $left=max($processed[$str]+1,$left);
        }
        $max=max($max,$i-$left+1);
        $processed[$str]=$i;
    }
    return $max;

}


//abcd ba

$tests=[
//    "abbacade",
    "abcba"
];
foreach ($tests as $t){
    echo lengthOfLongestSubstring($t).PHP_EOL;
}