<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/20
 * Time: 0:13
 */


class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function printNumbers1($n) {
        $ret=[];
        for($i=1;$i<pow(10,$n);$i++){
            $ret[]=$i;
        }
        return $ret;
    }

    #--------------
    //全排列
    public $res=[];
    function printNumbers($n) {
        $num=[];
        for($i=0;$i<$n;$i++){
            $num[]='0';
        }
        $this->dfs(0,$n,$num);
        return $this->res;




    }
    function dfs($x,$n,$num){
        if($x==$n){
            $num=ltrim(join('',$num),'0');
            if($num){
                $this->res[]=$num;
            }
            return ;
        }
        for($i=0;$i<10;$i++){
            $num[$x]=$i;
            $this->dfs($x+1,$n,$num);
        }
    }
}
$so=new Solution();
$r=$so->printNumbers(2);
print_r($r);