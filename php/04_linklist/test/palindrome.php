<?php
include '../singleNode.php';


$testData=[
    ['a'],
    ["a","b"],
    ["a","b","a"],
    ["a","b","b","a"],
    ["a","b","c","b"],
    ["a","b","c","b","a"],
    ["a","b","c","c","b","a"],
];
foreach ($testData as $v){
    $nodelList=nodeList::createNode($v);
    echo $nodelList->printNode() ."===>".var_export($nodelList->isPalindrome(),1).PHP_EOL;

}


