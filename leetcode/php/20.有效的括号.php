<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/7/21
 * Time: 23:02
 */
class Solution {

    public $dict=[
        ')'=>'(',
        '}'=>'{',
        ']'=>'['
    ];
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {

        $len=strlen($s);
        $stack=[];
        for($i=0;$i<$len;$i++){
            $word=$s{$i};
            //在dict的key里
            if(isset($this->dict[$word])){
                $last=array_pop($stack);

                if($last!=$this->dict[$word]){
                    return false;
                }
            }else{
                array_push($stack,$word);
            }

        }
        return empty($stack);
    }
}
$tests=[
    '()',
    '(())',
    ')('
];
$so=new Solution();
foreach ($tests as $v){
    echo $v."---".var_export($so->isValid($v),1).PHP_EOL;
}


