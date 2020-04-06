<?php
/**
 * Date: 2020/1/16
 * Time: 23:20
 */

class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList)
    {
        if (empty($wordList) || !in_array($endWord, $wordList)) {
            return 0;
        }
        $len = strlen($beginWord);

        $all_combo_dict = [];
        foreach ($wordList as $v) {
            for ($i = 0; $i < $len; $i++) {
                $key = substr_replace($v, '*', $i, 1);
                $all_combo_dict[$key][] = $v;
            }
        }

        $queueExists=[];
        $queue = [[$beginWord, 1]];
//        $levelArr=[];
        while ($queue) {
            [$current, $level] = array_shift($queue);
            if(isset($queueExists[$current])) continue;
//            $levelArr[$level][]=$current;
            //记录是否加入过队列
            $queueExists[$current]=1;

            if ($current == $endWord) {
//                print_r($levelArr);
                return $level;
            }
            $currentPattern = $this->pattern($current);

            foreach ($currentPattern as $k) {
                if (isset($all_combo_dict[$k])) {
                    foreach ($all_combo_dict[$k] as $item){
                        array_push($queue, [$item, $level + 1]);

                    }
                }
            }

        }
        return 0;

    }

    function pattern($word)
    {
        $len = strlen($word);
        $pattern = [];
        for ($i = 0; $i < $len; $i++) {
            $pattern[] = substr_replace($word, "*", $i, 1);
        }
        return $pattern;
    }

}

$so = new Solution();

$tests = [
    ['hit', 'cog', ["hot", "dot", "dog", "lot", "log", "cog"]],
//    ["hot", "dog",["hot", "dog"]],
//    ['hot','dog',["hot","cog","dog","tot","hog","hop","pot","dot"]]

];
foreach ($tests as $t){
    echo  var_export($so->ladderLength($t[0], $t[1], $t[2]),1).PHP_EOL;
}








