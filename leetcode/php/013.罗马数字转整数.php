<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/27
 * Time: 20:50
 */
class Solution {

    private $one=[
        'I'=>1,
        'V'=>5,
        'X'=>10,
        'L'=>50,
        'C'=>100,
        'D'=>500,
        'M'=>1000,
    ];
    private $two=[
        'IV'=>4,
        'IX'=>9,
        'XL'=>40,
        'XC'=>90,
        'CD'=>400,
        'CM'=>900,

    ];

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $arr=str_split($s);
        $i=0;
        $len=count($arr);
        $num=0;
        //处理下2个的和1个的
        while($i<$len){
            if(isset($arr[$i+1])){
                $s=$arr[$i].$arr[$i+1];
                if(isset($this->two[$s])){
                    $i+=2;
                    $num+=$this->two[$s];
                    continue;
                }
            }
            $num+=$this->one[$arr[$i]];

            $i+=1;
        }

        return $num;
    }
}

$tests=[
    'IV',
    'IX',
    'LVIII',
    'MCMXCIV'
];
$so=new Solution();
foreach ($tests as $t){
    echo $t.'===>'.$so->romanToInt($t).PHP_EOL;
}


