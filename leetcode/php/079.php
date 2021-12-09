<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2021/01/01
 * Time: 22:41
 * 单词搜索，回溯
 *
 */

class Solution
{
    public $directs = [[0, 1], [0, -1], [1, 0], [-1, 0]];

    public $mark = [];

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        $len = count($board);
        if ($len == 0) {
            return false;
        }
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                if ($board[$i][$j] == $word{0}) {
                    $this->mark[$i][$j] = 1;
                    if ($this->backtrack($i, $j, $board, substr($word, 1))) {
                        return true;
                    }
                    $this->mark[$i][$j] = 0;
                }
            }
        }
        return false;

    }

    function backtrack($i, $j, $board, $word)
    {
        if (strlen($word) == 0) {
            return true;
        }

        foreach ($this->directs as $direct) {
            $cur_i = $i + $direct[0];
            $cur_j = $j + $direct[1];

            if (
                $cur_i >= 0 && $cur_i < count($board) &&
                $cur_j >= 0 && $cur_j < count($board[0]) &&
                $board[$cur_i][$cur_j] == $word{0}

            ) {
                if (!empty($this->mark[$cur_i][$cur_j])) {
                    continue;
                }
                $this->mark[$cur_i][$cur_j] = 1;
                if ($this->backtrack($cur_i, $cur_j, $board, substr($word, 1))) {
                    return true;
                }
                $this->mark[$cur_i][$cur_j] = 0;
            }
        }
        return false;
    }

}


$board =
    [
        ['A', 'B', 'C', 'E'],
        ['S', 'F', 'C', 'S'],
        ['A', 'D', 'E', 'E']
    ];
$so = new Solution();

$words = [
    "ASF",
    'ABCCED',
    'ABCB'
];


foreach ($words as $word) {
    var_dump($so->exist($board, $word));
}







































