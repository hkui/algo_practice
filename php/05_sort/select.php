<?php
namespace Algo_05_sort;

require_once '../vendor/autoload.php';

$arr=Sort::randData(10);

echo join(',',$arr);
$a=Sort::selectSort($arr);
echo PHP_EOL;
echo join(',',$a);
