<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2019/9/17
 * Time: 8:52
 */

namespace Algo_05_sort;

class Sort
{

    //冒泡
    public static function bubbleSort($arr)
    {
        $len = count($arr);
        /*for($i=0;$i<$len-1;$i++){
            for($j=$i+1;$j<$len;$j++){
                if($arr[$i]>$arr[$j]){
                    $tmp=$arr[$j];
                    $arr[$j]=$arr[$i];
                    $arr[$i]=$tmp;
                }
            }
        }*/
        for ($i = 0; $i < $len; $i++) {
            $flag = false;
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    $flag = true;
                }
            }
            //类似a b c d  a<b  b<c  c<d  说明是有序的就无需再比较了
            if ($flag == false) {
                break;
            }


        }
        return $arr;
    }

    //归并
    public static function mergeSort($arr)
    {

    }


    //选择
    public static function selectSort($arr)
    {

    }

    //插入
    public static function insertSort($arr)
    {
        return $arr;
    }

    //快排
    public static function quickSort($arr)
    {

    }

    //计数排序
    public static function countingSort($arr)
    {

    }

    //基数排序
    public static function radixSort($arr)
    {

    }

    //堆排序
    public static function heapSort($arr)
    {

    }

    //生成随机的数组
    public static function randData($len = 5)
    {
        $arr = [];
        for ($i = 0; $i < $len; $i++) {
            $arr[] = mt_rand(-1000, 1000);
        }
        return $arr;
    }


}