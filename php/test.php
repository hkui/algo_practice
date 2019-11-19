<?php

function maxLen($s){
    $max=0;
    $arr=[];
    $left=$right=0;
    $len=strlen($s);

    while($left<=$len-1 && $right<=$len-1){
        if(!in_array($s[$right], $arr)){
                $arr[]=$s[$right];
                $right++;
                
        }else{
            //在里面
            $index=array_search($s[$right], $arr);
             for($i=$left;$i<=$index;$i++){
                unset($arr[$i]);
             }
            $arr[]=$s[$right];
            $right++;
            $left=$index+1;


        }
        $max=max($max,count($arr));
    }
    return $max;

}

$test=[
    "1",
    "11",
    "123",
    "1231",
    "12345326",
    "abcdcfegh"
];

/*
$arr=["a","b","c"];
unset($arr[1]);
print_r($arr);
$arr[]="d";
print_r($arr);
echo array_search('c', $arr);
die;*/



foreach ($test as $v) {
   echo $v."===>".maxLen($v).PHP_EOL;
}



?>
