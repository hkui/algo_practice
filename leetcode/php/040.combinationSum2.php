<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/8
 * Time: 22:19
 */
class Solution {

    public $res=[];
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        sort($candidates);
        $this->combile($candidates,$target,[],0);
        return $this->res;
    }
    public function combile($candidates,$target,$step,$start){
        if($target<0) return;
        if($target==0 && !empty($step)){
            $this->res[]=$step;
            return;
        }
        $len=count($candidates);
        $val=0;
        for($i=$start;$i<$len;$i++){
            //同层级的 的值相等的continue
            if($val==$candidates[$i]){
                continue;
            }
            $val=$candidates[$i];
            $nextTarget=$target-$candidates[$i];
            if($nextTarget<0) break;
            $newStep=$step;
            $newStep[$i]=$candidates[$i];
            $this->combile($candidates,$nextTarget,$newStep,$i+1);
        }
    }
}

$so=new Solution();

$tests=[
    [[1,1,2,5,6,7],8],
//    [[2,5,2,1,2],5]
];
foreach ($tests as $t){
    $res=$so->combinationSum2($t[0],$t[1]);
    print_r($res);
}
