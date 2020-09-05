<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/6
 * Time: 0:01
 */

function threeSum($nums){
    $len=count($nums);
    if($len<2){
        return [];
    }
    sort($nums);
    $ret=[];
    for($i=0;$i<$len;$i++){
        //预处理
        if($nums[$i]>0) return [];
        if($i>=1 && $nums[$i]==$nums[$i-1]){
            continue;
        }

        $m=$i+1;
        $n=$len-1;
        while($m<$n){
            $target=$nums[$i]+$nums[$m]+$nums[$n];

            if($target>0){
                $n--;
            }elseif($target<0){
                $m++;
            }else{
                $ret[]=[$nums[$i],$nums[$m],$nums[$n]];
                //预处理
                while( $m<$n && $nums[$m] ==$nums[$m+1]){
                    $m++;
                }
                while($m<$n && $nums[$n] ==$nums[$n-1]){
                    $n--;
                }
                $m++;
                $n--;
            }
        }
    }
    return $ret;

}

$tests=[
//    [-1,0,1,2,-1,-4],
    [0,0,0,0],
//    [-4,-2,-2,-2,0,1,2,2,2,3,3,4,4,6,6],//[[-4,-2,6],[-4,0,4],[-4,1,3],[-4,2,2],[-2,-2,4],[-2,0,2]]

];
foreach ($tests as $t){
    $res=threeSum($t);
    print_r($res);
}

