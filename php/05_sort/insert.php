<?php
namespace Algo_05_sort;

require_once '../vendor/autoload.php';


$arr=Sort::randData(5);
//$arr=[1,2,3,4,5];
echo join(',',$arr);
$a=Sort::insertSort($arr);
echo PHP_EOL;
echo join(',',$a);


