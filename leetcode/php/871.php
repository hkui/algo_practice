<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/28
 * Time: 22:30
 * 最低加油次数
 */
class Solution
{

    /**
     * @param Integer $target
     * @param Integer $startFuel
     * @param Integer[][] $stations
     * @return Integer
     */
    function minRefuelStops($target, $startFuel, $stations)
    {
        $stationsNum = count($stations);
        /**
         * dp[i] 为加 i 次油能走的最远距离或者装最多的油，需要满足 dp[i] >= target 的最小 i
         *
         * 每多一个加油站 station[i] = (location, capacity)，如果之前可以通过加 t 次油到达这个加油站，
         * 现在就可以加 t+1 次油得到 capcity 的油量
         */
        $dp = [];
        $dp[0] = $startFuel;
        //考察每个加油站
        for ($i = 0; $i < $stationsNum; ++$i) {
            //
            for ($t = $i; $t >= 0; --$t) {
                //前提是能到达当前的加油站
                if ($dp[$t] >= $stations[$i][0]) {
                    $dp[$t + 1] = max($dp[$t + 1], $dp[$t] + $stations[$i][1]);
                }
            }
        }

        for ($i = 0; $i <= $stationsNum; $i++) {
            if ($dp[$i] >= $target) {
                return $i;
            }
        }
        return -1;
    }
}

error_reporting(0);
$tests = [
//    [ 1,  1,[]],
//    [100,1,[[10,100]]],
    [100, 10, [[10, 60], [20, 30], [30, 30], [60, 40]]],
];
$so = new Solution();
foreach ($tests as $t) {
    $r = $so->minRefuelStops($t[0], $t[1], $t[2]);
    echo $r . PHP_EOL;
}

