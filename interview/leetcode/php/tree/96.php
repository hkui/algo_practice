<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/6
 * Time: 23:28
 * https://leetcode-cn.com/problems/unique-binary-search-trees/
 * 不同的二叉搜索树
 */
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {
       return $this->G($n);
    }
    function G($n){
        static $G;
        if($n==0||$n==1){
            return 1;
        }
        if($G[$n]){
            return $G[$n];
        }
        $sum=0;
        for($i=1;$i<=$n;$i++){
            $sum+=$this->F($i,$n);
        }
        $G[$n]=$sum;
        return $sum;
    }
    function F($i,$n){
        return $this->G($i-1)*$this->G($n-$i);
    }
}


$s=new Solution();
echo $s->numTrees(19);



