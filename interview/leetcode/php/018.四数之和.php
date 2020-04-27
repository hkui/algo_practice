<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/27
 * Time: 22:23
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        sort($nums);
        $res=[];
        $len=count($nums);
        for ($i=0;$i<$len;$i++){
            for($j=$i+1;$j<$len;$j++){
                $left=$j+1;
                $right=$len-1;

                while($left<$right){
                    $sum=$nums[$i]+$nums[$j]+$nums[$left]+$nums[$right];

                    if($sum==$target){
                        $key=join('-',[$nums[$i],$nums[$j],$nums[$left],$nums[$right]]);
                        $res[$key]=[$nums[$i],$nums[$j],$nums[$left],$nums[$right]];
                        #echo $i."--".$j.'---'.$left."---".$right.PHP_EOL;
                        while($left<$right && $nums[$left]==$nums[$left+1]){
                            $left++;
                        }
                        while($left<$right && $nums[$right] ==$nums[$right-1]){
                            $right--;
                        }
                        $left++;
                        $right--;

                    }elseif ($sum>$target){
                        $right--;
                    }else{
                        $left++;
                    }
                }


            }
        }
        return array_values($res);
    }
}

$tests=[
//    ['nums'=>[1, 0, -1, 0, -2, 2],'target'=> 0],
 #   ['nums'=>[-3,-2,-1,0,0,1,2,3],'target'=> 0], #-3,0,1,2     -3,0,1,2重复，用hash可以解决的 得优化
    ['nums'=>[1,-2,-5,-4,-3,3,3,5],'target'=>-11],


];
$so=new Solution();
foreach ($tests as $t){
    $r=$so->fourSum($t['nums'],$t['target']);
    print_r($r);
}
