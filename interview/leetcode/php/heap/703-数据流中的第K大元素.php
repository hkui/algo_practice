<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/8
 * Time: 22:40
 * 703. 数据流中的第K大元素
 */
class KthLargest {
    public $heapArr=[];
    public $heapSize;
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->heapSize=$k;
        $i=1;
        foreach ($nums as $num){
            if(count($this->heapArr) ==$this->heapSize){
                if($num>$this->heapArr[1]){
                    $this->heapArr[1]=$num;
                    $this->heapSmallFirst($this->heapArr);
                }
            }else{
                $this->heapArr[$i++]=$num;
                $this->heapSmallLast($this->heapArr);
            }
        }
    }


    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        if(count($this->heapArr) ==$this->heapSize){
            if($val>$this->heapArr[1]){
                $this->heapArr[1]=$val;
                $this->heapSmallFirst($this->heapArr);
            }
        }else{
            $this->heapArr[count($this->heapArr)+1]=$val;
            $this->heapSmallLast($this->heapArr);
        }
        return $this->heapArr[1];
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
    function heapSmallFirst(&$arr)
    {
        $size = count($arr);
        $firstPos = 1;
        while (true) {
            $leftPos = 2 * $firstPos;
            $rightPos = $leftPos + 1;
            if ($size >= $rightPos) {
                if ($arr[$leftPos] < $arr[$rightPos]) {
                    $minPos = $leftPos;
                } else {
                    $minPos = $rightPos;
                }
            } elseif ($size < $rightPos && $size >= $leftPos) {
                $minPos = $leftPos;
            } else {
                break;
            }
            if ($arr[$firstPos] > $arr[$minPos]) {
                $tmp = $arr[$minPos];
                $arr[$minPos] = $arr[$firstPos];
                $arr[$firstPos] = $tmp;
                $firstPos = $minPos;
            } else {
                break;
            }
        }
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
$nums = [4,5,8,2];
$k=3;

$obj=new KthLargest($k,$nums);
echo $obj->add(3).PHP_EOL;
echo $obj->add(5).PHP_EOL;
echo $obj->add(10).PHP_EOL;
echo $obj->add(9).PHP_EOL;
echo $obj->add(4).PHP_EOL;

