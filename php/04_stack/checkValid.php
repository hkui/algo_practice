<?php
$dict=[
    ")"=>"(",
    "]"=>"[",
    "}"=>"{",
];

$check_arr=[
    '{}',
    '}{',
    '((({})))',
    '{()})',
    '{(){}()}',
];
foreach ($check_arr as $str){
    echo $str."        ".var_export(checkValid($str),1).PHP_EOL;
}

function checkValid($str){
    global $dict;
    $stack_arr=[];
    $len=strlen($str);

    for ($i=0;$i<$len;$i++){
        $s=$str[$i];
        if(in_array($s,array_values($dict))){
            array_push($stack_arr,$s);

        }elseif (in_array($s,array_keys($dict))){
            if(empty($stack_arr) || (array_pop($stack_arr)!=$dict[$s])){
                return false;
            }
        }
    }
    return empty($stack_arr);

}









