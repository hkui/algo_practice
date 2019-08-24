<?php
$arr=[1,4,7,10,12,18,20,23,30];

function bsearch($arr,$n){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
//        $mid=intval(($low+$high)/2);
        $mid=$high-intval(($high-$low)>>1);
        if($arr[$mid]==$n){
            return $mid;
        }elseif($n<$arr[$mid]){  //n在 [low，mid-1]
            $high=$mid-1;
        }else{  //n 在[mid+1,high]
            $low=$mid+1;
        }
    }
    return -1;
}
echo "======".PHP_EOL;
echo implode(',',$arr).PHP_EOL;




foreach ( $arr as $k=>$v){
    echo $k."-->".bsearch($arr,$v)."==============".$v.PHP_EOL;
}
echo PHP_EOL;




