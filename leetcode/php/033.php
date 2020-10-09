<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/9
 * Time: 23:04
 * 搜索旋转排序数组
 *
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $len=count($nums);
        $low=0;
        $high=$len-1;
        while($low<=$high){
            $mid=$low+(($high-$low)>>1);
            if($nums[$mid]==$target){
                return $mid;
            }
            //左边有序
            if($nums[$low]<=$nums[$mid]){
                if($target<$nums[$mid] && $target>=$nums[$low]){
                    $high=$mid-1;
                }else{
                    $low=$mid+1;
                }
            }else{
                //右边有序
                if($target>$nums[$mid] && $target<=$nums[$high]){
                    $low=$mid+1;
                }else{
                    $high=$mid-1;
                }
            }
        }
        return -1;
    }

}

$tests = [
//    [[4, 5, 6, 7, 8, 1, 2, 3], 5],
//    [[1],1],
//    [[8,9,1,2,3,4,5,6,7],1],
    [[4,5,6,7,0,1,2],0],
//    [[8,9,2,3,4],9],
//    [[5,1,3],1]

];
$so=new Solution();
foreach ($tests as $t) {
    $r = $so->search($t[0], $t[1]);
    var_dump($r);
}


