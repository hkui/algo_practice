<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/8
 * Time: 18:53
 */

class Heap
{

    private $size;
    private $type=0; //0小根堆，1 大根堆
    public $dataArr=[];
    private $count=0;
    public function __construct($size,$type=0)
    {
       $this->size=$size;
       $this->type=$type;
    }
    private function isFull(){
        if ($this->size == 0) {
            return false;
        }
        return $this->count>=$this->size;
    }
    //插入建堆
    public function insert($data){
        if($this->isFull()){
            return false;
        }
        $this->dataArr[++$this->count]=$data;
        $this->heapInsetLast();
    }

    /**
     * 堆化插入的最后一个元素
     */
    public function heapInsetLast(){
        if($this->type==0){
            $this->heapSmallLast();
        }else{
            $this->heapBigLast();
        }
    }

    /**
     * 小顶堆
     * 对于新插入的元素，堆化
     */
    public function heapSmallLast(){
        $smallPos=$this->count;

        while(true){
            $parentPos=intval($smallPos/2);
            //到根了
            if($parentPos==0){
                break;
            }
            if($this->dataArr[$smallPos]<$this->dataArr[$parentPos]){

                $tmp=$this->dataArr[$parentPos];
                $this->dataArr[$parentPos]=$this->dataArr[$smallPos];
                $this->dataArr[$smallPos]=$tmp;

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
        if($this->count<=1) {
            return false;
        }
        $first=1;
        while(true){

            $leftPos=2*$first;
            $rightPos=$leftPos+1;
            if($rightPos <=$this->count ){
                if($this->dataArr[$leftPos]<$this->dataArr[$rightPos]){
                    $smallPos=$leftPos;
                }else{
                    $smallPos=$rightPos;
                }
            }elseif ($rightPos>$this->count && $leftPos<=$this->count){
                $smallPos=$leftPos;
            }else{
                break;
            }
            $tmp=$this->dataArr[$first];
            $this->dataArr[$first]=$this->dataArr[$smallPos];
            $this->dataArr[$smallPos]=$tmp;
            $first=$leftPos;
        }

    }

    /**
     * 大顶堆
     * 堆化最后1个插入的元素
     */
    public function heapBigLast(){
        $lastPos=$this->count;
        while(true){
            $parentPos=intval($lastPos/2);
            //到根了
            if($parentPos==0){
                break;
            }
            if($this->dataArr[$lastPos]>$this->dataArr[$parentPos]){
                $tmp=$this->dataArr[$parentPos];
                $this->dataArr[$parentPos]=$this->dataArr[$lastPos];
                $this->dataArr[$lastPos]=$tmp;

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
        while(true){
            $left=2*$first;
            $right=$left+1;
            if($this->count>=$right){
                if($this->dataArr[$left]>$this->dataArr[$right]){
                    $bigPos=$left;
                }else{
                    $bigPos=$right;
                }
            }elseif ($this->count>=$left && $this->count<$right){
                $bigPos=$left;
            }else{
                break;
            }

            if($this->dataArr[$bigPos]>$this->dataArr[$first]){
                $tmp=$this->dataArr[$first];
                $this->dataArr[$first]=$this->dataArr[$bigPos];
                $this->dataArr[$bigPos]=$tmp;

                $first=$bigPos;
            }else{
                break;
            }
        }
    }

    /**
     * 删除堆顶元素，拿把最后1个元素放到堆顶，开始堆化
     *
     */
    public function deleteFirst(){
        $first=$this->dataArr[1];
        $last=array_pop($this->dataArr);
        $this->count--;
        $this->dataArr[1]=$last;
        if($this->type){
            $this->heapSmallFirst();
        }else{
            $this->heapBigFirst();
        }
        return $first;
    }


    /**
     * 第k大的元素
     */
    public function topK(){

    }

}
$heap=new Heap(5);

$heap->insert(3);
$heap->insert(7);
$heap->insert(11);
$heap->insert(9);
$heap->insert(2);



print_r($heap->dataArr);
$heap->dataArr[1]=8;
print_r($heap->dataArr);
$heap->heapSmallFirst();
print_r($heap->dataArr);
