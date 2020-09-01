<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/8/27
 * Time: 22:52
 */


function quickSort(&$arr,$left ,$right){
    if($left>=$right){
        return ;
    }
    $mid=partition($arr,$left,$right);
    quickSort($arr,$left,$mid-1);
    quickSort($arr,$mid+1,$right);


}

function partition(&$arr,$left,$right){
    //把3挖出来
    $privot=$arr[$left];

    while($left<$right){
        //3,1,4,2,5,7
        //对于5,7
        while($arr[$right]>$privot && $left<$right){
            $right--;
        }
        //到2了
        if($arr[$right] <$privot && $left<$right){
            //把2放到3的地方,因为之前3已经存在了privot上
            $arr[$left]=$arr[$right];
            //现在left位置小于privot left指针右移动
            $left++;
        }
        //考察left处的值
        while($arr[$left]<$privot && $left<$right){
            $left++;
        }

        if($arr[$left]>$privot && $left<$right){

            $arr[$right]=$arr[$left];
            $right--;
        }

    }
    $arr[$left]=$privot;
    return $left;
}


$arr=[10,2,6,5,1,3];

quickSort($arr,0,count($arr)-1);

print_r($arr);
