<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/28
 * Time: 23:46
 * 祖玛游戏
 */

class Solution {

    /**
     * @param String $board
     * @param String $hand
     * @return Integer
     */
    function findMinStep($board, $hand) {
        $arr=[];
        for($i=0;$i<strlen($hand);$i++){
            if(!isset($arr[$hand{$i}])){
                $arr[$hand{$i}]=1;
            }else{
                $arr[$hand{$i}]++;
            }

        }
        return $this->aux($board,$arr);
    }
    private function aux($s,$arr){
        if(empty($s)) return 0;
        $lens=strlen($s);
        $res=2*$lens+1;

        for($i=0;$i<$lens;){
            $j=$i++; //j保存起点
            while ($i<$lens && $s{$i}==$s{$j}){
                $i++;
            }
            $inc=3-$i+$j;//3-($i-$j) 判断消除需要几个球
            if($arr[$s{$j}]>=$inc){
                //如果数量足够
                $used=$inc<=0?0:$inc; //如果inc<0,不需要
                $arr[$s{$j}]-=$used;
                $nextS=substr($s,0,$j).substr($s,$i);
                $tmp=$this->aux($nextS,$arr);//去除j到i的一段继续
                if($tmp>=0){
                    $res=min($res,$used+$tmp);
                }
                $arr[$s{$j}]+=$used;

            }
        }
        return $res==2*$lens+1?-1:$res;

    }
}


error_reporting(0);
$tests=[
//    ['WRRBBW','RB'],
//    ['WWRRBBWW','WRBRW'],
//    ['G',"GGGGG"],
//    ["RBYYBBRRB","YRBGB"],
    ["RRWWRRBBRR",'WB'],
];
$so=new Solution();
foreach ($tests as $t){
    $r=$so->findMinStep($t[0],$t[1]);
    echo $r.PHP_EOL;
}
