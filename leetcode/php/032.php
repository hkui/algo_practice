<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/7
 * Time: 19:45
 */

function longestValidParentheses($s){
    $len=strlen($s);
    if($len<2){
        return 0;
    }
    $stack=[];
    $max=0;
    for($i=0;$i<$len;$i++){
        $item=$s{$i};
        if($item=='('){
            array_push($stack,$i);
        }else{
            // )
            if(!empty($stack)){

                $lenTmp=$i-end($stack)+1;
                $max=max($lenTmp,$max);
                array_pop($stack);
            }


        }

    }
    return $max;
}


$tests=[
//    '())(())',
//    '(()(',
//    '((())(',
    ') () ) (()) ( ()()'


];
foreach ($tests as $s){
    $s=preg_replace('#\s*#','',$s);
//    echo $s;
    echo longestValidParentheses($s).PHP_EOL;
}
