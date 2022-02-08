<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $len=count($nums);
        $repeatNum=0;
        for($i=1;$i<$len;$i++){
            if($nums[$i]==$nums[$i-1]){
                $repeatNum++;
            }elseif ($nums[$i]<$nums[$i-1]){
                break;
            }else{
                if($repeatNum>0){
                    $this->move($nums,$len,$i,$repeatNum);
                }
            }
        }
        if($repeatNum>0){
            $this->move($nums,$len,$i,$repeatNum);
        }
        return $len;
    }
    function move(&$nums,&$len,&$i,&$repreatNum){
        for($j=$i-$repreatNum; $j<$len-$repreatNum; $j++){
            $nums[$j]=$nums[$j+$repreatNum];
        }
        $i=$i-$repreatNum;
        $len=$len-$repreatNum;
        $repreatNum=0;
    }

    /**
     * @author huangkui
     * DateTime: 2022/2/8 13:33
     * @param $nums
     * @return int
     * 快慢指针
     */
    function slowQuickPointer(&$nums) {
        $len=count($nums);
        if($len==0){
            return $len;
        }
        $i=0;
        $j=1;
        for(;$j<$len;$j++){
            if($nums[$i]!=$nums[$j]){
                $nums[$i+1]=$nums[$j];
                $i++;
            }
        }
        return $i+1;
    }

}
$nums = [1,1,1,2];
$nums=[0,0,1,1,1,2,2,3,3,4];
//$nums=[1,1];
$s=new Solution();
$len=$s->slowQuickPointer($nums);
var_dump($len);
print_r($nums);
