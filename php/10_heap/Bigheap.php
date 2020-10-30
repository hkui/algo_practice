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

    /**
     * @param $data
     * 插入到数据末尾
     */
    public function insert($data){
        $this->dataArr[$this->count+1]=$data;
        $this->count++;
        $this->heapFromLast();
    }

    /**
     * 从最后1个起开始堆化
     */
    public function heapFromLast(){
        $i=$this->count;
        while( ($p=intval($i/2))>0 && $this->dataArr[$p]<$this->dataArr[$i] ){
            $tmp=$this->dataArr[$p];
            $this->dataArr[$p]=$this->dataArr[$i];
            $this->dataArr[$i]=$tmp;
            $i=$p;
        }
    }

    /**
     * @return bool
     * 弹出堆顶
     * 把最后1个元素放入到堆顶
     * 从堆顶开始向下堆化
     */
    public function pop(){
        if($this->count<1){
            return false;
        }
        $top=$this->dataArr[1];
        $this->dataArr[1]=$this->dataArr[$this->count];
        $this->count--;
        $this->heapFromTop();
        return $top;
    }
    public function heapFromTop(){
        $i=1;
        while(($left=2*$i) && $left<=$this->count){
            if($left==$this->count){
               if($this->dataArr[$left]>$this->dataArr[$i]){
                    $tmp=$this->dataArr[$i];
                    $this->dataArr[$i]=$this->dataArr[$left];
                    $this->dataArr[$left]=$tmp;
                    break;
               }
            }else{
                $right=$left+1;
                $maxPos=$this->dataArr[$left]>$this->dataArr[$right]?$left:$right;
                if($this->dataArr[$maxPos]>$this->dataArr[$i]){
                    $tmp=$this->dataArr[$maxPos];
                    $this->dataArr[$maxPos]=$this->dataArr[$i];
                    $this->dataArr[$i]=$tmp;
                }
                $i=$maxPos;
            }

        }
    }


}
$bigHeap=new Bigheap(0);

$bigHeap->insert(10);
$bigHeap->insert(6);
$bigHeap->insert(5);
$bigHeap->insert(7);
print_r($bigHeap->dataArr);
var_dump($bigHeap->pop());
var_dump($bigHeap->pop());
var_dump($bigHeap->pop());

