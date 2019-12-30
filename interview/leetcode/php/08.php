<?php
//https://leetcode-cn.com/problems/string-to-integer-atoi/

class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $max=pow(2,31)-1;
        $min=-pow(2,31);
        $str=ltrim($str);
        if(empty($str)){
            return 0;
        }
        $first=$str[0];
        //首个非-非+非数字
        if($first!='-' && $first!='+' && !is_numeric($first)){
            return 0;
        }
        //首位是符号位 第二位没有或者非数字
        if(
            ($first=='-'||$first=='+') &&
            (!isset($str[1])|| !is_numeric($str[1]))
        )
        {
            return 0;
        }
        $numstr='';

        if($first=='-'||$first=='+'){
            $i=1;
        }else{
            $i=0;
        }

        while(isset($str[$i]) && is_numeric($str[$i])){
            $numstr.=$str[$i];
            $i++;
        }
        $numV=0;
        $numstr=ltrim($numstr,'0');
        $lenNum=strlen($numstr);
        $j=$lenNum-1;
        if($first=='-'){
            $delimiter=abs($min);
        }else{
            $delimiter=$max;
        }

        while( $j>=0){
            $pow=pow(10,$lenNum-$j-1);
            if($delimiter-$numV<$numstr[$j]*$pow){
                $numV=$delimiter;
                break;
            }
            $numV+=$numstr[$j]*$pow;
            $j--;
        }
        if($first=='-'){
            return -$numV;
        }
        return $numV;
    }
}


$so=new Solution();
$str='';
$test=[
    '-100',
    '+10211',
    '-123abc',
    '-91283472332',//-2147483648
    '-000000000000001',
    '2147483648', //2147483647


];
foreach ($test as $s){
    echo $so->myAtoi($s).PHP_EOL;
}


