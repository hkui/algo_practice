<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/30
 * Time: 0:06
 */

namespace Algo_10_heap;

//大根堆
class maxHeap
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
        //下标从1开始，好算些
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

    /**
     * 堆顶元素弹出后，把最后1个元素放在根
     * 开始堆化
     */
    public function heapFromTop(){
        $i=1;
        /**
         * 左子节点为2*$i,右子节点为2*$i+1
         */

        while(($left=2*$i) && $left<=$this->count){
            /**
             * 考察点称为node
             * 区分是否有右子节点 原因是 待考察节点如果小于其子节点交换时有区别
             *      如果只有左子节点，左比父大，直接交换左子与考察节点
             *      如果左右同时都有，需要找左右较大者
             *          如果待node小于这个较大者，与这个较大者交换后。对于待考察节点就符合大根堆性质了
             *      换下来的较小的考察点
             */

            //只有左了
            if($left==$this->count){
                //左子大于根，不符合大根堆的性质，需要交换
               if($this->dataArr[$left]>$this->dataArr[$i]){
                    $tmp=$this->dataArr[$i];
                    $this->dataArr[$i]=$this->dataArr[$left];
                    $this->dataArr[$left]=$tmp;
                    break;
               }
            }else{
                //有左有右
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
$bigHeap=new maxHeap(0);

$bigHeap->insert(10);
$bigHeap->insert(6);
$bigHeap->insert(5);
$bigHeap->insert(7);
print_r($bigHeap->dataArr);
var_dump($bigHeap->pop());
$bigHeap->insert(11);
var_dump($bigHeap->pop());
var_dump($bigHeap->pop());

