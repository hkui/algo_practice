<?php

class TrieNode
{
    public $letter;

    public $children = [];

    public $isEnd = false;

    public function __construct($letter = '')
    {
        $this->letter = $letter;
    }
}

class Trie
{
    public $root = [];

    /**
     */
    function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * @param String $word
     * @return NULL
     */
    function insert($word)
    {
        $len = strlen($word);
        $node = $this->root;
        for ($i = 0; $i < $len; $i++) {
            $w = $word[$i];
            if (!isset($node->children[$w])) {
                $node->children[$w] = new TrieNode($w);
                
            }
            $node = $node->children[$w];
        }
        $node->isEnd = true;
    }

    /**
     * 查找完整字符是否存在
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        $node=$this->root;
        $len=strlen($word);
        for ($i=0;$i<$len;$i++){
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
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix)
    {
        $word=$prefix;
        $node=$this->root;
        $len=strlen($word);
        for ($i=0;$i<$len;$i++){
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

$obj->insert('php');
$obj->insert('perl');


var_dump($obj->search('ph'));
var_dump($obj->startsWith('ph'));
/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */