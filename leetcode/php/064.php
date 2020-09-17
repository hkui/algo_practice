<?php
/**
 * Created by PhpStorm.
 * User: huangkui@lepu.cn
 * Date: 2020/9/17
 * Time: 20:54
 */

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minPathSum($grid)
{
    $dp=[];
    $h = count($grid); //高度
    $w = count($grid[0]);
    for($j=0;$j<$w;$j++){
        $dp[$h-1][$j]=$grid[$h-1][$j];
    }
    for($i=0;$i<$h;$i++){
        $dp[$i][$w-1]=$grid[$i][$w-1];
    }


    print_r($dp);

}

$grid = [
    [1, 3, 1],
    [1, 5, 1],
    [4, 2, 1]
];
minPathSum($grid);