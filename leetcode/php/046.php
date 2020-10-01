<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/27
 * Time: 22:33
 */

class Solution
{
    public $ret = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $numsKv = [];
        foreach ($nums as $v) {
            $numsKv[$v] = 1;
        }
        foreach ($numsKv as $num => $val) {

            $this->tree($num, $numsKv, [$num]);
        }
        return $this->ret;
    }

    private function tree($num, $numsKv, $step)
    {
        unset($numsKv[$num]);

        if (empty($numsKv)) {
            $this->ret[] = $step;
            return;
        }
        foreach ($numsKv as $n => $v) {
            $this->tree($n, $numsKv, array_merge($step, [$n]));
        }

    }
    ####----------dfs版本--------

    function permute1($nums)
    {
        $numsKv = [];
        foreach ($nums as $v) {
            $numsKv[$v] = true;
        }
        $this->dfs($numsKv,[],[]);

        return $this->ret;
    }

    private function dfs($numsKv,$path,$used){
        if(count($path)==count($numsKv)){
            $this->ret[]=$path;
            return ;
        }
        foreach ($numsKv as $num=>$v){
            if(!empty($used[$num]))continue;
            array_push($path,$num);
            $used[$num]=true;
            $this->dfs($numsKv,$path,$used);
            $used[$num]=false;
            array_pop($path);
        }
    }


}

$so = new Solution();
$nums = [1, 2, 3];
$r = $so->permute1($nums);
print_r($r);