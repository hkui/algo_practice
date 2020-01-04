<?php

class Solution
{
    public $ret=[];
    public $lookup = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z']
    ];
    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        if (strlen($digits)!=0)
            $this->bt([], $digits);
        return $this->ret;


    }
    public function bt($combine,$nextDigits){
        if(strlen($nextDigits)==0){
            $this->ret=$combine;
        }else{
            $arr=$this->lookup[substr($nextDigits,0,1)];

            $newCombile=[];
            foreach ($arr as $v0){
                if($combine){
                    foreach ($combine as $v1){
                        $newCombile[]=$v1.$v0;
                    }
                }else{
                    $newCombile[]=$v0;
                }
            }

            $this->bt($newCombile,substr($nextDigits,1));
        }

    }
}
$digits='27';
$so=new Solution();

$r=$so->letterCombinations($digits);
print_r($r);