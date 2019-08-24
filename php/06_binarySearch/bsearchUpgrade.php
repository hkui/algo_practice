<?php
//二分查找变形

//查找第一个等于给定值的元素
function bsearch_first($arr,$value){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
        $mid=$low+(($high-$low)>>1);

        if($arr[$mid]==$value){
            if($mid==0 ||$arr[$mid-1]!=$value){
                return $mid;
            }
            $high=$mid-1; //继续向左侧查找
        }elseif($value<$arr[$mid]){  //n在 [low，mid-1]
            $high=$mid-1;
        }else{  //n 在[mid+1,high]
            $low=$mid+1;
        }
    }
    return -1;
}
//查找最后1个等于给定值的元素
function bsearch_last($arr,$value){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
        $mid=$low+(($high-$low)>>1);

        if($arr[$mid]==$value){
            if($mid==$high ||$arr[$mid+1]!=$value){
                return $mid;
            }
            $low=$mid+1; //继续往右查找
        }elseif($value<$arr[$mid]){  //n在 [low，mid-1]
            $high=$mid-1;
        }else{  //n 在[mid+1,high]
            $low=$mid+1;
        }
    }
    return -1;
}
//查找第一个>=给定值的元素
function bsearch_first_egt($arr,$value){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
        $mid=$low+(($high-$low)>>1);

        if($arr[$mid]>=$value){
            if($mid==0||$arr[$mid-1]<$value){
                return $mid;
            }
            $high=$mid-1;
        }else{
            $low=$mid+1;
        }
    }
    return -1;
}

//查找最后1个<=等于给定值的元素
function bsearch_last_elt($arr,$value){
    $low=0;
    $high=count($arr)-1;
    //注意边界
    while($low<=$high){
        $mid=$low+(($high-$low)>>1);

        if($arr[$mid]<=$value){
            if($mid==$high||$arr[$mid+1]>$value){
                return $mid;
            }
            $low=$mid+1;
        }else{
            $high=$mid-1;
        }
    }
    return -1;
}

//$arr=[1,2,3,4,4,4,4,6,8];
//echo bsearch_first($arr,4);
//echo PHP_EOL;
//echo bsearch_last($arr,4);


$arr=[1,4,7,7,10,10,13,15];
echo bsearch_first_egt($arr,5);
echo PHP_EOL;
echo bsearch_last_elt($arr,11);
echo PHP_EOL;




