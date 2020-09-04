<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/10
 * Time: 10:46
 * https://leetcode-cn.com/problems/longest-valid-parentheses/
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $s=ltrim($s,')');

        $len=strlen($s);
        $queue=[];
        $maxArr=[];
        $delimiter=0;

        for($i=0;$i<$len;$i++){
            $str=$s{$i};
            if($str==')'){

                if(!empty($queue)){
                    $last=array_pop($queue);
                    if($last =='('){
                        $qlen=count($queue)+$delimiter;
                        if(!isset($maxArr[$qlen])){
                            $maxArr[$qlen]=0;
                        }
                        $maxArr[$qlen]=$maxArr[$qlen]+2;

                    }
                }else{
//                    $delimiter++;
                }
            }elseif ($str=='('){
               array_push($queue,$str);
            }
        }
        print_r($maxArr);
        if(empty($maxArr)){
            return 0;
        }
        if(empty($queue)){
            return array_sum($maxArr);
        }
        return max($maxArr);
    }
}


$so=new Solution();

$test=[
//    '(())()',
//    '()()()',
//    '(()',
//    '(',
//    '()(',
//    "()",
//
//    "()(()()",
//    "()() ( () ( ()()()",

    ")()() ) ()() (",


    ") ((((( ()() )()()))()(()))("



];
foreach ($test as $s){
    $s=preg_replace('#\s+#','',$s);

    $r=$so->longestValidParentheses($s);
    print_r($r);
    echo PHP_EOL;
}

