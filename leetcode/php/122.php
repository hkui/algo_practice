<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/10
 * Time: 0:14
 */

/**
 * @param Integer[] $prices
 * @return Integer
 */
function maxProfit($prices) {
    $profit=0;
    $len=count($prices);
    for($i=1;$i<$len;$i++){
        if($prices[$i]-$prices[$i-1]>0){
            $profit+=$prices[$i]-$prices[$i-1];
        }
    }
    return $profit;
}

$tests=[
    [7,1,5,3,6,4],
    [1,2,3,4,5]

];


foreach ($tests as $t){
    echo maxProfit($t).PHP_EOL;
}
