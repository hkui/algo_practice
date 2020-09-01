<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/8
 * Time: 12:28
 * 数组中的第K个最大元素
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        return $this->heap($nums,$k);
    }

    /**
     * @param $nums
     * @param $size
     * 构建小顶堆，容量为size
     */
    public function heap($nums,$size){
        $arr=[];
        $i=1;
        foreach($nums as $v){
            //堆已经满了
            if(count($arr) == $size){
                if($arr[1] <$v){
                    $arr[1]=$v;
                    $this->heapSmallFirst($arr);
                }

            }else{
                $arr[$i++]=$v;
                $this->heapSmallLast($arr,$size);
            }
        }
        return $arr[1];
    }

    /**
     * @param $arr
     * 堆化插入的最后1个元素
     */
    function heapSmallLast(&$arr){
        $lastPos=count($arr);
        while(true){
            $parentPos=intval($lastPos/2);
            if($parentPos<1){
                break;
            }
            if($arr[$lastPos]<$arr[$parentPos]){
                $tmp=$arr[$parentPos];
                $arr[$parentPos]=$arr[$lastPos];
                $arr[$lastPos]=$tmp;
                $lastPos=$parentPos;

            }else{
                break;
            }

        }

    }

    /**
     * @param $arr堆化头部元素
     */
    function heapSmallFirst(&$arr){
        $size=count($arr);
        $firstPos=1;
        while (true){
            $leftPos=2*$firstPos;
            $rightPos=$leftPos+1;
            if($size>=$rightPos){
                if($arr[$leftPos]<$arr[$rightPos]){
                    $minPos=$leftPos;
                }else{
                    $minPos=$rightPos;
                }
            }elseif ($size<$rightPos && $size>=$leftPos){
                $minPos=$leftPos;
            }else{
                break;
            }
            if($arr[$firstPos] >$arr[$minPos]){
                $tmp=$arr[$minPos];
                $arr[$minPos]=$arr[$firstPos];
                $arr[$firstPos]=$tmp;
                $firstPos=$minPos;
            }else{
                break;
            }
        }
    }



}
$nums=[3,2,1,5,6,4];
$nums=[-1,2,0];

$s=new Solution();
$r=$s->findKthLargest($nums,2);
echo $r;



