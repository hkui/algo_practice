<?php
//简单的二分查找场景

$arr=[1,4,7,10,12,18,20,23,30];

function bsearch($arr,$n){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
//        $mid=intval(($low+$high)/2);
        $mid=$low+(($high-$low)>>1);
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

//递归方式实现
function bsearch_recursion($arr,$n){
    return bsearch_recursion_internally($arr,0,count($arr)-1,$n) ;
}
function bsearch_recursion_internally($arr,$low,$high,$n){
    if($high<$low){
        return -1;
    }
    $mid=$high-(($high-$low)>>1);
    if($n==$arr[$mid]){
        return $mid;
    }
    if($n<$arr[$mid]){
        return bsearch_recursion_internally($arr,$low,$mid-1,$n);
    }else{
       return  bsearch_recursion_internally($arr,$mid+1,$high,$n);
    }
    return -1;
}
//求平方根
function squareRoot(){

}

echo implode(',',$arr).PHP_EOL;




foreach ( $arr as $k=>$v){
    echo $k."-->".bsearch_recursion($arr,$v)."==============".$v.PHP_EOL;
}
echo PHP_EOL;




