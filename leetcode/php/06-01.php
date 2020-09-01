<?php
//Z字形变换
//https://leetcode-cn.com/problems/zigzag-conversion/

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        if ($numRows < 2) {
            return $s;
        }
        $i=0;
        $len = strlen($s);
        $ret=[];
        $index=0;
        $flag=-1;

        for($j=0;$j<$numRows;$j++){
            $ret[$j]='';
        }
        while($i<$len){
            $ret[$index].=$s[$i++];
            if($index==0 ||$index== $numRows-1){
                $flag=-$flag;
            }
            $index=$index+$flag;
        }
        return join('',$ret);
    }

}

$solution=new Solution();

$s="LEETCODEISHIRING";
$s='AB';

$numRows=2;

echo $solution->convert($s,$numRows);


