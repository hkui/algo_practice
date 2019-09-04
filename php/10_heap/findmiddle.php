<?php
require_once "heap.php";

$arr=[9,8,11,4,2,6,5];
$arr=[9,8,11,4,2,6,5,100];
//大顶堆
$bigHeap=new heap(0,1);
//小顶堆
$smallHeap=new heap(0,0);


foreach ($arr as $k=>$v){
    if($bigHeap->isEmpty()){
        $bigHeap->insert($v);
    }else{
        $bigPeak=$bigHeap->peak();
        if($v<$bigPeak){
            $bigHeap->insert($v);
        }else{
            $smallHeap->insert($v);
        }

        if($bigHeap->count-$smallHeap->count>1){
            $bigPeak=$bigHeap->deleteFirst();
            $smallHeap->insert($bigPeak);
        }elseif($smallHeap->count-$bigHeap->count>1){
            $smallPeak=$smallHeap->deleteFirst();
            $bigHeap->insert($smallPeak);
        }

    }
}
if($bigHeap->count==$smallHeap->count){
    echo "middle= ".$bigHeap->peak().",".$smallHeap->peak().PHP_EOL;
}elseif($bigHeap->count>$smallHeap->count){
    echo "middle=".$bigHeap->peak().PHP_EOL;
}else{
    echo "middle=".$smallHeap->peak().PHP_EOL;
}
