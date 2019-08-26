<?php

function bsearch($arr,$value){
    $low=0;
    $high=count($arr)-1;

    while($high>=$low){
        $mid=$low+(($high-$low)>>1);
        if($arr[$mid] ==$value){
            return $mid;
        }
        if($value<$arr[$mid]){
            $high=$mid-1;
        }else{
            $low=$mid+1;
        }
    }
    return -1;
}
//第1个等于给定值
function bsearch_first_eq($arr,$value){
    $low=0;
    $high=count($arr)-1;

    while($high>=$low){
        $mid=$low+(($high-$low)>>1);
        if($arr[$mid]==$value){
            //因为是要找第一个，所以是从mid往前找，
            if($mid==0 ||$arr[$mid-1]!=$value){
                return $mid;
            }
            $high=$mid-1;
        }else if($arr[$mid]>$value){
            $high=$mid-1;
        }else{
            $low=$mid+1;
        }

    }
    return -1;
}

/**
 * @param $arr
 * @param $value
 * @return int
 * 最后1个等于给定值
 */
function bsearch_last_eq($arr,$value){
    $low=0;
    $high=count($arr)-1;

    while($high>=$low){
        $mid=$low+(($high-$low)>>1);

        if($arr[$mid] ==$value){
            //因为要找最后1个，需要往后找
            if($mid == $high || $arr[$mid+1] !=$value){
                return $mid;
            }
            $low=$mid+1;

        }elseif($arr[$mid]<$value){
            $low=$mid+1;
        }else{
            $high=$mid-1;
        }

    }
    return -1;
}

/**
 * @param $arr
 * @param $value
 * @return int
 * 第一个大于等于某值的
 */
function bsearch_first_egt($arr,$value){
    $low=0;
    $high=count($arr)-1;

    while($high>=$low){
        $mid=$low+(($high-$low)>>1);
        if($arr[$mid]>=$value){
            if($mid==0 ||$arr[$mid-1]<$value){
                return $mid;
            }
            $high=$mid-1;

        }else{
            $low=$mid+1;
        }


    }

    return -1;
}
//最后1个<=value
function  bsearch_last_elt($arr,$value){
    $low=0;
    $high=count($arr)-1;

    while($high>=$low){
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

$arr=[1,3,7,9,9,11,30,30,30,30,30,30,100];
echo implode(' ',$arr).PHP_EOL;
echo bsearch_first_eq($arr,9);
echo PHP_EOL;



echo bsearch_last_eq($arr,9);
echo PHP_EOL;

echo bsearch_last_elt($arr,10);
echo PHP_EOL;
die;
$arr=[1,3,5,5,6,8];
echo bsearch_first_gt($arr,4);





