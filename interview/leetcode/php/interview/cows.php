<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/23
 * Time: 22:51
 * 母牛问题。有一母牛，到4岁可生育，每年一头，所生均是一样的母牛，到15岁绝育，不再能生，20岁死亡，问n年后有多少头牛?
 */

function cows($years)
{
    static $sum = 0;

    for ($i = 1; $i < $years; $i++) {

        if ($i >= 4 && $i < 15) {
            $sum++;
            cows($years - $i);
        }
        if ($i == 20) {
            $sum--;
        }
    }
    return $sum;
}

$sum = cows(5);
echo $sum;