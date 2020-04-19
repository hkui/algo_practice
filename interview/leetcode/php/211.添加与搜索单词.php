<?php
/**
 * Created by PhpStorm.
 * User: huangkui@lepu.cn
 * Date: 2020/4/16
 * Time: 18:45
 */

class TireNode{
    public $letter='';
    public $children=[];
    public $isEnd=false;
    public function __construct($letter='')
    {
        $this->letter=$letter;
    }
}

class WordDictionary {
    public $root;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root=new TireNode();
    }

    /**
     * Adds a word into the data structure.
     * @param String $word
     * @return NULL
     */
    function addWord($word) {
        if(empty($word)){
            return;
        }
        $node=$this->root;
        $len=strlen($word);
        for($i=0;$i<$len;$i++){
            $w=$word[$i];
            if(!isset($node->children[$w])){
                $node->children[$w]=new TireNode($w);
            }
            $node=$node->children[$w];
        }
        $node->isEnd=true;
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        return $this->searchOneRoad($this->root,$word);
    }

    public function searchOneRoad(TireNode $node ,$word){
        $len=strlen($word);
        for($i=0;$i<$len;$i++){
            $w=$word[$i];
            if($w=='.'){
                //查找每条路
                foreach ($node->children as $childNode){
                    $r=$this->searchOneRoad($childNode,substr($word,$i+1));
                    if(!$r){
                        continue;
                    }else{
                        return true;
                    }
                }
                return false;

            }elseif (!isset($node->children[$w])){
                //这条路已经走完了
                return false;
            }else{
                //顺着这条路继续走下去
                $node=$node->children[$w];
            }
        }
        //都到结尾了
        if($node->isEnd){
            return true;
        }
        return false;

    }
}

$w=new WordDictionary();

$tests=[
    ['addWord','at'],
    ['addWord','and'],
    ['addWord','an'],
//    ['addWord','add'],

    ['search','..'],

];

foreach ($tests as $t){
    $r=call_user_func([$w,$t[0]],$t[1]);
    var_dump($r);
}
























