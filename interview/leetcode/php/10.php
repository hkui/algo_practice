<?php
/**
 * Date: 2020/1/12
 * Time: 11:54
 * https://leetcode-cn.com/problems/regular-expression-matching/
 * 正则表达式匹配
 */

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        if(empty($p)) return empty($s);
        //首位是否匹配
        $firstMatch=!empty($s) && ( $s[0]==$p[0]||$p[0]=='.');

        if(strlen($p)>=2 && $p[1]=='*'){
            return
                $this->isMatch($s,substr($p,2)) ||
                ($firstMatch && $this->isMatch(substr($s,1),$p));
        }else{
            return $firstMatch && $this->isMatch(substr($s,1),substr($p,1));
        }
    }
}
$so=new Solution();



$tests=[
//    ['aabc','a.*'],
    ['aa','a*'],
    ['abb','a*abb']
];
foreach ($tests as $t){
    $r=$so->isMatch($t[0],$t[1]);
    var_dump($r);
}




