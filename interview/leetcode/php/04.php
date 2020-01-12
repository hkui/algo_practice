<?php

class Solution {

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

$so=new Solution();

$tests=[
    [[1,2,6],[0,3,4,5]],
    [[1,3],[2,4]],
    [[1,3],[2]],

];
foreach ($tests as $t){
    echo $so->findMedianSortedArrays($t[0],$t[1]).PHP_EOL;
}