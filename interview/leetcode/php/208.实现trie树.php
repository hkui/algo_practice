<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/16
 * Time: 2:36
 */

class TireNode{
    public $letter; // 当前节点中存的字母
    public $children = []; // 当前节点的子节点
    public $isEnd = false; // 是否是该单词的最后一个字母

    public function __construct($letter=''){
        $this->letter = $letter;
    }
}


class Trie {
    public $root=[];
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root=new TireNode();

    }
    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $node=$this->root;
        $len=strlen($word);
        for($i=0;$i<$len;$i++){
            $w=$word[$i];
            //没在，这层加进去
            if(!isset($node->children[$w])){
                $node->children[$w]=new TireNode($w);
            }
            $node=$node->children[$w];
        }
        $node->isEnd=true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node=$this->root;
        $len=strlen($word);
        for($i=0;$i<$len;$i++){
            $w=$word[$i];
            if(!isset($node->children[$w])){
                return false;
            }
            $node=$node->children[$w];
        }
        if($node->isEnd){
            return true;
        }
        return false;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $word=$prefix;
        $node=$this->root;
        $len=strlen($word);
        for($i=0;$i<$len;$i++){
            $w=$word[$i];
            if(!isset($node->children[$w])){
                return false;
            }
            $node=$node->children[$w];
        }
        return true;
    }
}

$obj = new Trie();
$word='tea';
$obj->insert($word);
$obj->insert('to');
$obj->insert('tee');
$obj->insert('hk');

$r=$obj->startsWith('h');
var_dump($r);



//print_r($obj->root);
