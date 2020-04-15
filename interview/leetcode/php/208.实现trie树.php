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

        for($i=0;$i<$len;$i++){
            $one=$word[$i];
            $path[$one]=$one;
            if(!isset($cur[$one])){
                $cur[$one]=$path;
            }else{

            }

        }

    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {

    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {

    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
$obj = new Trie();
$word='tea';
$obj->insert($word);
print_r($obj->root);
