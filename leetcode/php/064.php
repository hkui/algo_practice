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
    //最后1行,只能往右边移动，从右往左
    //右下角的值等于其本身
    $dp[$h-1][$w-1]=$grid[$h-1][$w-1];
    //最后1行倒数第二个往左求值
    for($j=$w-2;$j>=0;$j--){
        $dp[$h-1][$j]=$grid[$h-1][$j]+$dp[$h-1][$j+1];
    }
    //最后1列，倒数第二个起，从下向上
    for($i=$h-2;$i>=0;$i--){
        $dp[$i][$w-1]=$grid[$i][$w-1]+$dp[$i+1][$w-1];
    }
    //右左上右左
    for($i=$h-2;$i>=0;$i--){
        for($j=$w-2;$j>=0;$j--){
            $dp[$i][$j]=min($dp[$i+1][$j],$dp[$i][$j+1])+$grid[$i][$j];
        }
    }
    return $dp[0][0];

}

$grid = [
    [1, 3, 1],
    [1, 5, 1],
    [4, 2, 1]
];
echo minPathSum($grid);