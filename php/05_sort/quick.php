<?php
namespace Algo_05_sort;

require_once '../vendor/autoload.php';

$arr=Sort::randData(10,-100,100);
//$arr=[4,2,5,1,6,3];

echo join(',',$arr);
Sort::quickSort($arr,0,count($arr)-1);
echo PHP_EOL;
echo join(',',$arr);
