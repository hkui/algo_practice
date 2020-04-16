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
     * Returns if the word is in the data structure. A word could contain the dot character '.' to represent any one letter.
     * @param String $word
     * @return Boolean
     */
    function search($word) {

    }
}

$w=new WordDictionary();
$w->addWord('tee');
$w->addWord('ta');

print_r($w->root);


