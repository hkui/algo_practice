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

    //归并 递归
    public static function mergeSort(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return;
        }
        $mid = intval(($start + $end) / 2);
        self::mergeSort($arr, $start, $mid);
        self::mergeSort($arr, $mid + 1, $end);
        self::merge($arr, $start, $end);
        return $arr;
    }

    /**
     * @param $arr
     * @param $start
     * @param $end
     * 合并2个有序数组
     */
    public static function merge(&$arr, $start, $end)
    {
        $tmpArr = [];
        $mid = intval(($start + $end) / 2);
        $i = $start;
        $j = $mid + 1;
        while ($i <= $mid && $j <= $end) {
            if ($arr[$i] < $arr[$j]) {
                $tmpArr[] = $arr[$i];
                $i++;
            } elseif ($arr[$j] < $arr[$i]) {
                $tmpArr[] = $arr[$j];
                $j++;
            } else {
                $tmpArr[] = $arr[$i];
                $tmpArr[] = $arr[$j];
                $i++;
                $j++;
            }
        }
        while ($i <= $mid) {
            $tmpArr[] = $arr[$i];
            $i++;
        }
        while ($j <= $end) {
            $tmpArr[] = $arr[$j];
            $j++;
        }
        $k = 0;
        foreach ($tmpArr as $v) {
            $arr[$start + $k] = $v;
            $k++;
        }

    }


    //选择排序
    public static function selectSort($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            if ($minIndex != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$minIndex];
                $arr[$minIndex] = $tmp;
            }
        }
        return $arr;
    }

    //插入排序
    public static function insertSort($arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $value = $arr[$i];

            for ($j = $i - 1; $j >= 0; $j--) {
                if ($value < $arr[$j]) {
                    $arr[$j + 1] = $arr[$j];
                } else {
                    break;
                }
            }
            $arr[$j + 1] = $value;

        }
        return $arr;


        /* $sorted=[];
         while($head=array_shift($arr)){
             $len=count($sorted);
             for($i=$len-1;$i>=0;$i--){
                 if($sorted[$i]>$head){
                     $sorted[$i+1]=$sorted[$i];
                 }else{
                     break;
                 }
             }

             $sorted[$i+1]=$head;

         }
         return $sorted;*/
    }

    //快排
    public static function quickSort(&$arr,$start,$end)
    {
        if($start>=$end){
            return;
        }
        $partIndex=self::partition($arr,$start,$end);
        self::quickSort($arr,$start,$partIndex-1);
        self::quickSort($arr,$partIndex+1,$end);
    }

    /**
     * @param $arr
     * @param $start
     * @param $end
     * 快排的分区
     */
    public static function partition(&$arr,$start,$end){
        $value=$arr[$end];
        $i=$start;$j=$start;
        for(;$j<=$end-1;$j++){
            if($arr[$j]<$value){
                $tmp=$arr[$i];
                $arr[$i]=$arr[$j];
                $arr[$j]=$tmp;
                $i++;
            }
        }
        $arr[$end]=$arr[$i];
        $arr[$i]=$value;
        return $i;

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
    public static function randData($len = 5,$start=-1000,$end=1000)
    {
        $arr = [];
        for ($i = 0; $i < $len; $i++) {
            $arr[] = mt_rand($start, $end);
        }
        return $arr;
    }


}