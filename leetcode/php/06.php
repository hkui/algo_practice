<?php
//Z字形变换
//https://leetcode-cn.com/problems/zigzag-conversion/

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if($numRows<2){
            return $s;
        }
        $len=strlen($s);
        $ret=[];
        $x=$y=0;
        $yStep=$numRows; //向下走的步数
        $i=0;
        E:
        while($yStep){
            if($i>=$len){
                break;
            }
            $ret[$x][$y]=$s[$i++];
            $x++;//横轴不变，纵轴向下
            $yStep--;
        }

        $x--; //向下走多了，回1步
        $roteStep=$numRows-1; //斜向上走的步数

        while($roteStep){
            $y++;
            $x--;
            if($i>=$len){
                break ;
            }
            $ret[$x][$y]=$s[$i++];
            $roteStep--;
        }

        $yStep=$numRows-1;
        $x++;
        if($i<$len){
            goto E;
        }

        $str='';
        foreach ($ret as $k=>$v){
            $str.=join('',$v);
        }
        return $str;
    }

}

$solution=new Solution();

$s="abcdefghijk";
$s='AB';

$numRows=1;

echo $solution->convert($s,$numRows);


