<?php

class Solution
{
    public $board;
    public $word;
    public $y;
    public $x;
    public $wordLen;

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    public function exist($board, $word)
    {
        $this->y = count($board);
        $this->x = count($board[0]);
        $this->wordLen = strlen($word);
        $this->board = $board;
        $this->word = $word;


        for ($i = 0; $i < $this->y; $i++) {
            for ($j = 0; $j < $this->x; $j++) {
                if ($this->search($i, $j, 0)) {
                    return true;
                }
            }
        }
        return false;

    }

    public function search($i, $j, $index)
    {
        if ($index == $this->wordLen) {
            return true;
        }
        if ($i < 0 || $i >= $this->y || $j < 0 || $j >= $this->x || $this->word{$index} != $this->board[$i][$j]) {
            return false;
        }
        $tmp = $this->board[$i][$j];
        $this->board[$i][$j] = "*";

        $found =
            $this->search($i, $j - 1, $index + 1)  //左
            || $this->search($i + 1, $j, $index + 1)  //下
            ||$this->search($i,$j+1,$index+1)   //右
            ||$this->search($i-1,$j,$index+1);//上
        $this->board[$i][$j]=$tmp;

        return $found;

    }
}

$board = [["A", "B", "C", "E"], ["S", "F", "C", "S"], ["A", "D", "E", "E"]];
$word = "ABCCED";

$s=new Solution();
$r=$s->exist($board, $word);
var_dump($r);





