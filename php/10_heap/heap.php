<?php
include_once '../09_tree/node.php';

class heap
{
    public $dataArr=[];
    public $count=0;

    public function insert($data){
        $this->dataArr[$this->count+1]=$data;
        $this->count++;

        $i=count($this->dataArr);
        //大根堆，根最大,依次比较插入的节点和其父节点
        //从下而上的堆化
        while(intval($i/2)>0 &&$this->dataArr[$i]>$this->dataArr[intval($i/2)]){
            $tmp=$this->dataArr[$i];
            $this->dataArr[$i]=$this->dataArr[intval($i/2)];
            $this->dataArr[intval($i/2)]=$tmp;
            $i=$i/2;
        }
    }

    /**
     * 删除堆顶的元素
     */
    public function deleteRoot(){

        $root=$this->dataArr[1];
        $last=array_pop($this->dataArr);
        if($this->count<1){
            return null;
        }
        $this->count--;
        $i=1;
        $this->dataArr[$i]=$last;

        //至上而下的堆化
        while (true){
            //找出1个最小树中最大的
            $maxPos=$i;
            $left=2*$maxPos;
            $right=$left+1;
            if($left<=$this->count){
                if($this->dataArr[$maxPos]<$this->dataArr[$left]){
                    $maxPos=$left;
                }

            }
            if($right<=$this->count){
                if($this->dataArr[$maxPos]<$this->dataArr[$right]){
                    $maxPos=$right;
                }
            }
            if($maxPos==$i){ //在3个个节点间没发生替换 满足堆的性质 退出循环
                break;
            }

            $tmp=$this->dataArr[$maxPos];
            $this->dataArr[$maxPos]=$this->dataArr[$i];
            $this->dataArr[$i]=$tmp;
            $i=$maxPos;
        }
        return $root;

    }
    public function heapify(){

    }


}
$heap=new heap();

$arr=[50,3,60,70,45,20,100,0,58];
foreach ($arr as $v){
    $heap->insert($v);
}


echo implode(',',$heap->dataArr);
echo PHP_EOL;
while(($r=$heap->deleteRoot())!==null){
    echo $r." ";
}
echo PHP_EOL;
print_r($heap);










