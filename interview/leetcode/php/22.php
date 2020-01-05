<?php
/**
 *括号生成
 *https://leetcode-cn.com/problems/generate-parentheses/
 */

class Solution {
    private $result=[];

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->_gen(0,0,$n,'');
        return $this->result;
    }
    public function _gen($left,$right,$n,$result){
        if($left==$n && $right==$n){
            $this->result[]=$result;
            return;
        }
        if($left<$n){
            $this->_gen($left+1,$right,$n,$result."(");
        }
        if($right<$n && $right<$left){
            $this->_gen($left,$right+1,$n,$result.")");
        }
    }


}

$so=new Solution();
$r=$so->generateParenthesis(2);
print_r($r);


