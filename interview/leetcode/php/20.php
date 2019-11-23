<?php
//有效括号

function isValid($s) {
    $dict=[
    	')'=>'(',
    	']'=>'[',
    	"}"=>'{'
    ];
    $len=strlen($s);
    $stack=[];
    for($i=0;$i<$len;$i++){
    	if(in_array($s[$i], array_keys($dict))){
    		if(empty($stack) ||array_pop($stack)!=$dict[$s[$i]]){
    			return false;
    		}
    	}else{
    		array_push($stack,$s[$i]);
    	}
    }

    return empty($stack);
}

$tests=[
	"(){}",
	"([])",
	"(((({))))"
];
foreach ($tests as $v) {
	var_dump(isValid($v));
}

?>