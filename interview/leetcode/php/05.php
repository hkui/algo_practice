<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/7
 * Time: 16:47
 */
/**
 * 最长回文子串
 * 给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000
 */
class Solution {

    /**
     * @param String $s
     * @return String
     *
     * 暴力破解
     */
    function _longestPalindrome($s) {
        $len=strlen($s);
        $resstr='';
        $max=0;
        for($i=0;$i<$len;$i++){
            for($j=$i+1;$j<=$len;$j++){
                $testLen=$j-$i+1;
                $testStr=substr($s,$i,$testLen);
                if( $testLen>$max && $this->_isPalindromic($testStr) ){
                    $resstr=$testStr;
                    $max=$testLen;
                }

            }
        }
        return $resstr;
    }

    public function _isPalindromic($s){
        if(empty($s)) return false;
        $len=strlen($s);
        for($i=0;$i<intval($len/2);$i++){
            if($s{$i}!=$s{$len-$i-1}){
                return false;
            }
        }
        return true;
    }

    //----------扩展法------------------------

    public function longestPalindrome($s){
        $len=strlen($s);
        $start=0;
        $max=0;
        for($i=0;$i<$len;$i++){
            $len1=$this->expandAroundCenter($i,$i,$s);
            $len2=$this->expandAroundCenter($i,$i+1,$s);

            $maxLen=max($len1,$len2);
            if($maxLen>$max){
                $start=$i-intval(($maxLen-1)/2);
                $max=$maxLen;
            }
        }
        return substr($s,$start,$max);
    }
    public function  expandAroundCenter($left,$right,$s){
        $l=$left;
        $r=$right;
        $len=strlen($s);
        while($l>=0 && $r<$len && $s{$l} ==$s{$r}){
            $l--;
            $r++;
        }
        return $r-$l-1;
    }
}
$s=new Solution();
$str="abbacab";
//$str='cbbd';

$r=$s->longestPalindrome($str);
var_dump($r);

