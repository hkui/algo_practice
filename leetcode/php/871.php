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
     * dp方式
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
    //速度更快的大根堆方式
    public function minRefuelStopsHeap($target, $startFuel, $stations){
        $maxHeap=new SplMaxHeap();
        $n=0;
        $current=$startFuel; //当前油量
        foreach ($stations as $v){
            while($current<$v[0] && !$maxHeap->isEmpty()){
                $current+=$maxHeap->extract();
                $n++;
            }
            if($current<$v[0]){
                return -1;
            }
            $maxHeap->insert($v[1]);
        }
        while($current<$target && !$maxHeap->isEmpty()){
            $current+=$maxHeap->extract();
            $n++;
        }

        if($current<$target){
            return -1;
        }
        return $n;
    }

}

error_reporting(0);
$tests = [
//    [ 1,  1,[]],
//    [100,1,[[10,100]]],
//    [100, 10, [[10, 60], [20, 30], [30, 30], [60, 40]]],
    [1000,83,[[15,457],[156,194],[160,156],[230,314],[390,159],[621,20],[642,123],[679,301],[739,229],[751,174]]],
        [100,50,[[25,25],[50,50]]]
];
$so = new Solution();

foreach ($tests as $t) {
    $r = $so->minRefuelStopsHeap($t[0], $t[1], $t[2]);
    echo $r . PHP_EOL;
}

