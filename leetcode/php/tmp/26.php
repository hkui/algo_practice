<?php

//待改良,使用快慢指针 todo
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
}
$nums = [1,1,1,2];
$nums=[0,0,1,1,1,2,2,3,3,4];
//$nums=[1,1];
$s=new Solution();
$len=$s->removeDuplicates($nums);
var_dump($len);
print_r($nums);
