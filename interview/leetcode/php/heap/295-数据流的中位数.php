<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/9
 * Time: 11:36
 * https://leetcode-cn.com/problems/find-median-from-data-stream/
 */
class MedianFinder {

    public $bigHeap=[]; //大顶堆
    public $smallHeap=[];//小顶堆
    /**
     * initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num) {
        $bigSize=count($this->bigHeap);
        if($bigSize==0){
            $this->bigHeap[$bigSize+1]=$num;
            $this->heapBigLast();
        }else{
            $bigPeak=$this->bigHeap[1];

            if($num<$bigPeak){
                $this->bigHeap[count($this->bigHeap)+1]=$num;
                $this->heapBigLast();
                //需要把大顶堆的头拿出来加入到小顶堆底部 然后堆化这俩堆
                if(count($this->bigHeap) -count($this->smallHeap)>1){
                    $bigFirst=$this->bigHeap[1];
                    $this->bigHeap[1]=array_pop($this->bigHeap);
                    $this->heapBigFirst();

                    $this->smallHeap[count($this->smallHeap)+1]=$bigFirst;

                    $this->heapSmallLast();
                }

            }else{

                //插入的元素比大顶堆的都大，插入到small
                $this->smallHeap[count($this->smallHeap)+1]=$num;

                $this->heapSmallLast();

                if(count($this->smallHeap)-count($this->bigHeap)>1){
                    $smallFirst=$this->smallHeap[1];
                    $this->smallHeap[1]=array_pop($this->smallHeap);
                    $this->heapSmallFirst();
                    $this->bigHeap[count($this->bigHeap)+1]=$smallFirst;
                    $this->heapBigLast();
                }
            }
        }


    }


    /**
     * @return Float
     */
    function findMedian() {
        $smallSize=count($this->smallHeap);
        $bigSize=count($this->bigHeap);
        if($smallSize==$bigSize){
            $mid= ($this->smallHeap[1]+$this->bigHeap[1])/2;
            return sprintf("%.01lf", $mid);
        }
        if($smallSize<$bigSize){
            return sprintf("%.01lf", $this->bigHeap[1]);
        }
        return sprintf("%.01lf", $this->smallHeap[1]);
    }


/*
* 大顶堆
* 堆化最后1个插入的元素
*/
    public function heapBigLast(){
        $lastPos=count($this->bigHeap);
        while(true){
            $parentPos=intval($lastPos/2);
            //到根了
            if($parentPos==0){
                break;
            }
            if($this->bigHeap[$lastPos]>$this->bigHeap[$parentPos]){
                $tmp=$this->bigHeap[$parentPos];
                $this->bigHeap[$parentPos]=$this->bigHeap[$lastPos];
                $this->bigHeap[$lastPos]=$tmp;
                $lastPos=$parentPos;
            }else{
                break;
            }
        }
    }
    /**
     * 大顶堆 从根开始堆化
     *
     */
    public function heapBigFirst(){
        $first=1;
        $count=count($this->bigHeap);
        while(true){
            $left=2*$first;
            $right=$left+1;
            if($count>=$right){
                if($this->bigHeap[$left]>$this->bigHeap[$right]){
                    $bigPos=$left;
                }else{
                    $bigPos=$right;
                }
            }elseif ($count>=$left && $count<$right){
                $bigPos=$left;
            }else{
                break;
            }

            if($this->bigHeap[$bigPos]>$this->bigHeap[$first]){
                $tmp=$this->bigHeap[$first];
                $this->bigHeap[$first]=$this->bigHeap[$bigPos];
                $this->bigHeap[$bigPos]=$tmp;

                $first=$bigPos;
            }else{
                break;
            }
        }
    }
    /**
     * 小顶堆
     * 对于新插入的元素，堆化
     */
    public function heapSmallLast(){
        $smallPos=count($this->smallHeap);

        while(true){
            $parentPos=intval($smallPos/2);
            //到根了
            if($parentPos==0){
                break;
            }
            if($this->smallHeap[$smallPos]<$this->smallHeap[$parentPos]){

                $tmp=$this->smallHeap[$parentPos];
                $this->smallHeap[$parentPos]=$this->smallHeap[$smallPos];
                $this->smallHeap[$smallPos]=$tmp;

                $smallPos=$parentPos;
            }else{
                break;
            }
        }
    }

    /**
     * 小顶堆
     * 堆化根部元素
     *
     */
    public function heapSmallFirst(){
        $count=count($this->smallHeap);
        if($count<=1) {
            return false;
        }
        $first=1;
        while(true){
            $leftPos=2*$first;
            $rightPos=$leftPos+1;
            if($rightPos <=$count ){
                if($this->smallHeap[$leftPos]<$this->smallHeap[$rightPos]){
                    $smallPos=$leftPos;
                }else{
                    $smallPos=$rightPos;
                }
            }elseif ($rightPos>$count && $leftPos<=$count){
                $smallPos=$leftPos;
            }else{
                break;
            }
            if($this->smallHeap[$first]>$this->smallHeap[$smallPos]){
                $tmp=$this->smallHeap[$first];
                $this->smallHeap[$first]=$this->smallHeap[$smallPos];
                $this->smallHeap[$smallPos]=$tmp;
                $first=$leftPos;
            }else{
                break;
            }

        }
    }

}

$obj =new MedianFinder();




$arr=[1,2,3,4,5,6,7,8,9,10];
foreach ($arr as $num){
    $obj->addNum($num);


    echo $obj->findMedian().PHP_EOL;
}



