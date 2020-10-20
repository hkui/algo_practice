<?php
/**
 * Created by PhpStorm.
 * User: 764432054@lepu.cn
 * Date: 2020/10/20
 * Time: 19:33
 * 变形二分查找
 */


class Bsearch{
    /**
     * 1.查找第一个值等于给定值的元素
     * 1,2,3,4,4,4,5,6,7 找找第一个4
     */
    public static function bsearch_first_eq($arr,$value){
        $len=count($arr);
        $i=0;
        $j=$len-1;
        while ($i<=$j){
            $mid=$i+(($j-$i)>>1);
            if($value==$arr[$mid]){
                if($mid==0 ||$arr[$mid-1]!=$value){
                    return $mid;
                }
                $j=$mid-1;

            }elseif ($value<$arr[$mid]){
                $j=$mid=1;
            }else{
                $i=$mid+1;
            }
        }
        return -1;
    }
}

$arr=[1,2,3,4,4,4,4,4,5,6,7,8];
echo Bsearch::bsearch_first_eq($arr,4);

