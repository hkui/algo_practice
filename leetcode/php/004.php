<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/2
 * Time: 22:17
 * 寻找两个正序数组的中位数
 */

class Solution
{
    public $odd = true;
    public $kvPrev = null;
    public $kv;

    public $index1;
    public $index2;


    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $len1 = count($nums1);
        $len2 = count($nums2);
        $i = 0;
        $j = 0;
        $len = $len1 + $len2;

        //偶数个
        if ($len % 2 == 0) {
            $this->index1 = $len / 2 - 1;
            $this->index2 = $len / 2;
            $this->odd = false;
        } else {
            $this->index1 = $this->index2 = intval($len / 2);
        }
        $k = -1;
        while ($i < $len1 && $j < $len2) {
            if ($nums1[$i] < $nums2[$j]) {
                $kv = $nums1[$i];
                $i++;
                $r = $this->addK($k, $kv);
                if (!is_null($r)) {
                    return $r;
                }

            } elseif ($nums1[$i] > $nums2[$j]) {
                $kv = $nums2[$j];
                $j++;
                $r = $this->addK($k, $kv);
                if (!is_null($r)) {
                    return $r;
                }
            } else {
                $kv = $nums1[$i];
                $i++;
                $j++;
                $r = $this->addK($k, $kv, 2);
                if (!is_null($r)) {
                    return $r;
                }
            }

        }
        while ($i < $len1) {
            $kv = $nums1[$i];
            $i++;
            $r = $this->addK($k, $kv);
            if (!is_null($r)) {
                return $r;
            }

        }
        while ($j < $len2) {
            $kv = $nums2[$j];
            $j++;
            $r = $this->addK($k, $kv);
            if (!is_null($r)) {
                return $r;
            }

        }

    }

    public function addK(&$k, $kv, $step = 1)
    {
        //奇数
        if ($this->odd) {
            if ($k + 1 == $this->index1) {
                return $kv ;
            }
            $k++;
        } else {
            //偶数
            if ($k + 1 == $this->index1) {
                $this->kvPrev = $kv;
            } elseif ($k + 1 == $this->index2) {
                if (!is_null($this->kvPrev)) {
                    return ($kv + $this->kvPrev) / 2;
                }
            }
            $k++;
        }
        if ($step == 2) {
            return $this->addK($k, $kv, 1);
        }
    }



}
#--------下面是二分法----------------
class Solution1{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        if(count($nums1)>count($nums2)){
            $tmp=$nums2;
            $nums2=$nums1;
            $nums1=$tmp;
        }
        $m=count($nums1);
        $n=count($nums2);
        $totalLeft=intval(($m+$n+1)/2);
        $left=0;
        $right=$m;

        /**
         * 分隔线在第2个数组右边第一个元素下标为i
         * 分隔线在第2个数组右边第一个元素下标为j
         *
         * 在nums1的[0,m]查找恰当的分隔线
         * 使得nums[i-1]<=num2[j] && num2[j-1]<=num1[i]
         */


        while($left<$right){
            $i=$left+intval(($right-$left+1)/2);
            $j=$totalLeft-$i;
            if($nums1[$i-1]>$nums2[$j]){
                $right=$i-1; //[left ,i-1]
            }else{
                $left=$i;
            }

        }
        $i=$left;
        $j=$totalLeft-$i;
        $nums1LeftMax=$i==0? PHP_INT_MIN:$nums1[$i-1];
        $nums1RightMin=$i==$m? PHP_INT_MAX:$nums1[$i];

        $nums2LeftMax=$j==0? PHP_INT_MIN:$nums2[$j-1];

        $nums2RightMin=$j==$n? PHP_INT_MAX:$nums2[$j];

        if(($m+$n)%2==0){
            //左边最大+右边最小的和的二分之一
            return (max($nums1LeftMax,$nums2LeftMax)+min($nums1RightMin,$nums2RightMin))/2;
        }
        //分隔线左边最大
        return max($nums1LeftMax,$nums2LeftMax);
    }
}

class Solution2 {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $len1=count($nums1);
        $len2=count($nums2);
        $sum=$len1+$len2;
        $k=ceil(($sum)/2);
        $leftmid=$this->getKth($nums1,0,$len1-1,$nums2,0,$len2-1,$k);

        if($sum%2!=0){
            return $leftmid;
        }
        $rightmid=$this->getKth($nums1,0,$len1-1,$nums2,0,$len2-1,$k+1);
        return ($rightmid+$leftmid)*0.5;

    }

    function getKth($nums1,$start1,$end1,$nums2,$start2,$end2,$k){
        $len1=$end1-$start1+1;
        $len2=$end2-$start2+1;
        if($len1>$len2){
            return $this->getKth($nums2,$start2,$end2,$nums1,$start1,$end1,$k);
        }
        if($len1==0){
            return $nums2[$start2+$k-1];
        }
        if($k==1){
            return min($nums1[$start1],$nums2[$start2]);
        }
        $i=$start1+min(intval($k/2),$len1)-1;
        $j=$start2+min(intval($k/2),$len2)-1;
        if($nums1[$i]<$nums2[$j]){
            return $this->getKth($nums1,$i+1,$end1,$nums2,$start2,$end2,$k-($i-$start1+1));
        }else{
            return $this->getKth($nums1,$start1,$end1,$nums2,$j+1,$end2,$k-($j-$start2+1));
        }

    }
}


$tests = [
    [[1,3,4,5],[2,6,7,9]],
//    [[1,3],[2]]
//    [[1,2],[3,4]],
//    [[0, 0], [0, 0]],
//    [[1, 2, 5, 5], [3, 4, 5, 5]],
];

$so = new Solution1();
foreach ($tests as $t) {
    $r = $so->findMedianSortedArrays($t[0], $t[1]);
    var_dump($r);
}

