<?php

class Solution
{
    public function next($str)
    {
        $len = strlen($str);
        $leftStr = '';
        $rightStr = '';
        $commonLen = 0;
        $i = 0;
        while ($i < $len-1) {
            $leftStr .= $str[$i];
            $rightStr = $str[$len - $i - 1] . $rightStr;
            if ($leftStr == $rightStr) {
                $commonLen = $i + 1;
            }
            $i++;
        }
        return $commonLen;

    }

    public function prefix($str)
    {
        $arr = [];
        $len = strlen($str);
        $tmp = '';
        for ($i = 0; $i < $len; $i++) {
            $tmp .= $str[$i];
            $arr[$i] = $this->next($tmp);
        }
        return $arr;
    }
    public function strStr($haystack, $needle)
    {
        $len1 = strlen($haystack);
        $len2 = strlen($needle);
        if ($len2 == 0) {
            return 0;
        }
        if ($len1 < $len2 || ($len1 == $len2 && $haystack != $needle)) {
            return -1;
        }
        $prefix = $this->prefix($needle);

        $j = 0;
        $i = 0;
        while ($i < $len1) {
            if ($haystack[$i] == $needle[$j]) {
                //模式串到末尾了
                if ($j >= $len2 - 1) {
                    return $i - $j;
                }
                $i++;
                $j++;
            } else {
                //模式串需要向左移动的位置
                if($j==0){
                    $i++;
                }else{
                    $j=$prefix[$j-1];
                }
                if ($i + $len2-$j > $len1) {
                    return -1;
                }

            }
        }
        return -1;
    }
}


$s = new Solution();
$tests = [
    ["mississippi", "issi"],
    ["abc",'c'],
//    ['aabaabaaf','aabaaf'],
//    ['aaaaaaaaab','ab'],
//["abbabaaaabbbaabaabaabbbaaabaaaaaabbbabbaabbabaabbabaaaaababbabbaaaaabbbbaaabbaaabbbbabbbbaaabbaaaaababbaababbabaaabaabbbbbbbaabaabaabbbbababbbababbaaababbbabaabbaaabbbba"
//,"bbbbbbaa"],
//    ["abbbbbbbaab", "bbbbbbaa"],
//    ['abcabcabcd','abcd'],
//    ["aabaaabaaac","aabaaac"],
//    ["abcdef", "de", 3],
//     ["abcdef","b",1],
    // ["abcdef","deg",-1],
    // ["hello","ll",2],
//    ["mississippi", "issip", 4],
    // ["mississippi","issipi",-1],
	[file_get_contents('./data/haystack'),file_get_contents('./data/needle'),-1]
];
//$r = $s->prefix('bbbbbb');
//print_r($r);
//die;


foreach ($tests as $v) {
    var_dump($s->strStr($v[0], $v[1]));
}


?>