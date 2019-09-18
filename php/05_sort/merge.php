<?php
namespace Algo_05_sort;

require_once '../vendor/autoload.php';

//$arr=Sort::randData(10);
$arr=[2,1,3,5,6,4,10,9];

echo join(',',$arr);
echo PHP_EOL;
Sort::mergeSort($arr,0,count($arr)-1);
echo PHP_EOL;
echo join(',',$arr);
