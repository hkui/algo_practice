<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/25
 * Time: 23:50
 */

$cash = 20;
$user_arr = array(8,8,8,8,8,8,8,8,8,8);
while($cash>0){
    $user_id = rand(0, 9);
    if($user_arr[$user_id]<12){
        $user_arr[$user_id]++;
        $cash--;
    }
}

print_r($user_arr);

