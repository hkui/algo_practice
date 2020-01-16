<?php
/**
 * Date: 2020/1/16
 * Time: 23:20
 */

class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {

        if(empty($wordList) || !in_array($endWord,$wordList)){
            return 0;
        }
        $len=strlen($beginWord);

        $all_combo_dict=[];
        foreach ($wordList as $v){
            for ($i=0;$i<$len;$i++){
                $key=substr_replace($v,'*',$i,1);
                $all_combo_dict[$key]=$v;
            }
        }
        print_r($all_combo_dict);


    }

}
$so=new Solution();
$beginWord = "hit";
$endWord = "cog";
$wordList = ["hot","dot","dog","lot","log","cog"];

$beginWord="hot";
$endWord="dog";
$wordList=["hot","dog"];



echo $so->ladderLength($beginWord,$endWord,$wordList);





