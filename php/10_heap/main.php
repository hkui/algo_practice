<?php
require_once "heap.php";

$arr=[50,3,60,70,45,20,100,0,58];

/*$heap=new heap();
foreach ($arr as $v){
    $heap->insert($v);
}

while(($r=$heap->deleteRoot())!==null){
    echo $r." ";
}
print_r($heap);*/
$heap1=new heap();

foreach ($arr as $v){
    $heap1->insertOnly($v);
}


$heap1->doHeapUpToDown();
//堆化后的
print_r($heap1->dataArr);

$heap1->heapSort();
print_r($heap1->dataArr);
