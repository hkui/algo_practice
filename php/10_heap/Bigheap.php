<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/30
 * Time: 0:06
 */

namespace Algo_10_heap;

//大根堆
class Bigheap
{
    public $count=0;
    public $dataArr=[];
    public $size; //堆的大小 0表示不限制大小自动扩容
    public function __construct($size)
    {
        $this->size=$size;
    }
    public function insert($data){
        $this->dataArr[$this->count+1]=$data;
        $this->count++;
        $this->heap();


    }
    public function heap(){
        $i=$this->count;
        while( ($p=intval($i/2))>0 && $this->dataArr[$p]<$this->dataArr[$i] ){
            $tmp=$this->dataArr[$p];
            $this->dataArr[$p]=$this->dataArr[$i];
            $this->dataArr[$i]=$tmp;
            $i=$p;
        }

    }

}
$bigHeap=new Bigheap(0);

$bigHeap->insert(10);
$bigHeap->insert(6);
$bigHeap->insert(5);
$bigHeap->insert(7);
print_r($bigHeap->dataArr);
