<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/7/29
 * Time: 21:30
 */
class Solution {
    public $result=[];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        if($target<=0) return[];
        sort($candidates);
        $this->combile($candidates,$target,[],0);
        return $this->result;
    }
    function combile($nums,$target,$steps,$start){
        if($target==0){
            $this->result[]=$steps;
        }
        $len=count($nums);
        for($i=$start;$i<$len;$i++){
            $num=$nums[$i];
            $diff=$target-$num;
            if($diff<0){
                break;
            }
            $this->combile($nums,$diff,array_merge($steps,[$num]),$i);
        }

    }
}

$tests=[
    [[2,3,6,7],7],
//    [[2,3,5],8]
];
$so=new Solution();
foreach ($tests as $t){
    $r=$so->combinationSum($t[0],$t[1]);
    print_r($r);
}