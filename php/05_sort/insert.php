<?php
namespace Algo_05_sort;

require_once '../vendor/autoload.php';

$arr=[4,2,5,1,6,3];

$arr=Sort::randData(20);


echo join(',',$arr);
$a=Sort::insertSort($arr);
echo PHP_EOL;
echo join(',',$a);


