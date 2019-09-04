<?php
/**
 *1.静态数据集合求top n
 *2.动态数据集合求top n
 */
require_once "heap.php";

$static_data=[2,5,3,1,0,7,6,10];


//第3大
/*
2,5,3               2
2,5,3 1             2
2,5,3,1,0           2
2,5,3,1,0,7         3
2,5,3,1,0,7,6       5
2,5,3,1,0,7,6,10    6

维持1个小顶堆 大小为3即可
*/
$heap=new heap(3);
foreach ($static_data as $v){
    echo $heap->topn($v).PHP_EOL;
}
