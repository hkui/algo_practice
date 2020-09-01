<?php
/**
 * Class Solution
 * 搜索旋转排序数组
 * https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */

    function search($nums, $target)
    {
        $len = count($nums);
        $left = 0;
        $right = $len - 1;
        $roate_index=$this->find_roate_index($nums,$left,$right);


        if($target>$nums[$right]){
            $right=$roate_index-1;
        }else{
            $left=$roate_index;
        }



        while ($left <= $right) {
            $mid=intval(($left+$right)/2);
            if($target==$nums[$mid]){
                return $mid;
            }elseif ($target>$nums[$mid]){
                $left=$mid+1;
            }else{
                $right=$mid-1;
            }
        }
        return -1;
    }

    /**
     * @param $nums
     * @param $left
     * @param $right
     * @return int
     * 找到旋转点(数组中最小的元素)
     */
    function find_roate_index($nums,$left,$right){
        if($nums[$left]<=$nums[$right]){
            return 0;
        }
        while($left<=$right){
            $mid=intval(($left+$right)/2);
            if($nums[$mid]>$nums[$mid+1]){
                return $mid+1;
            }
            if($nums[$mid] <$nums[$mid-1]){
                return $mid;
            }
            if($nums[$mid]>$nums[$left]){
                $left=$mid+1;
            }else{
                $right=$mid-1;
            }

        }
    }
}

$so = new Solution();




$tests = [
    [[4, 5, 6, 7, 8, 1, 2, 3], 8],
    [[1],1],
    [[5,1,2,3,4],1],
    [[4,5,6,7,0,1,2],0],
    [[8,9,2,3,4],9],
    [[5,1,3],1]

];

foreach ($tests as $t) {
    $r = $so->search($t[0], $t[1]);
    var_dump($r);
}




