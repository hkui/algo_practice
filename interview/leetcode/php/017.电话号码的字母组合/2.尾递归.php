<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/15
 * Time: 21:48
 */
class Solution {
    protected $lookup=[
        2=>['a','b','c'],
        3=>['d','e','f'],
        4=>['g','h','i'],
        5=>['j','k','l'],
        6=>['m','n','o'],
        7=>['p','q','r','s'],
        8=>['t','u','v'],
        9=>['w','x','y','z'],
    ];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if(empty($digits)){
            return [];
        }

        $len=strlen($digits);
        if($len<2){
            return $this->lookup[$digits[0]];
        }
        return $this->mergeOneRemain($this->lookup[$digits[0]],substr($digits,1));
    }

    /**
     * @param $firstArr ['a','b','c']
     * @param $remain    23
     * @return array|mixed
     */
    function mergeOneRemain($firstArr,$remain){
        $len=strlen($remain);
        if($len>1){
            $ret=$this->mergeOneRemain($this->lookup[$remain[0]],substr($remain,1));

        }else{
            $ret=$this->lookup[$remain[0]];
        }

        $ret=$this->mergeTwo($firstArr,$ret);
        return $ret;
    }

    function mergeTwo($letterA,$letterB){
        $lenA=count($letterA);
        $lenB=count($letterB);

        $ret=[];
        for($i=0;$i<$lenA;$i++){
            for($j=0;$j<$lenB;$j++){
                $ret[]=$letterA[$i].$letterB[$j];
            }
        }
        return $ret;
    }
}


$so=new Solution();
$r=$so->letterCombinations("2347");

print_r($r);

