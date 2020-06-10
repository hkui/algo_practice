<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/6/11
 * Time: 0:05
 */

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $num1Set=[];
        foreach ($nums1 as $v){
            $num1Set[$v]=1;
        }
        $num2Set=[];
        foreach ($nums2 as $v){
            $num2Set[$v]=1;
        }
        $ret=[];

        foreach ($num1Set as $k=>$v){
            if(isset($num2Set[$k])){
                $ret[]=$k;
            }
        }
        return $ret;
    }
}
$so=new Solution();
$nums1=[1,2,2,1];
$nums2=[2,2];

$r=$so->intersection($nums1,$nums2);
print_r($r);


