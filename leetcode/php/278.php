<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/18
 * Time: 22:15
 * 第一个错误的版本
 */
class Solution  {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $i=1;
        $j=$n;
        $maxTrueVersion=1;
        while($i<=$j){
            $mid=intval(($i+$j)/2);
            $flag=$this->isBadVersion($mid);
            #echo $i."--".$j."---".$mid."--".$flag.PHP_EOL;

            #true是坏的版本，说明该往前找
            if($flag){
               $j=$mid-1;
                if(!$this->isBadVersion($j)){
                    return $mid;
                }

            }else{
                #说明是正确的版本，再往后中招
               $i=$mid+1;
               if($this->isBadVersion($i)){
                   return $i;
               }
            }
            $maxTrueVersion=$mid;

        }
        return $maxTrueVersion;
    }

    public function isBadVersion($version){
        //第一个错误的版本
        if($version>=4) return true;
        return false;
    }

}
$so=new Solution();
echo $so->firstBadVersion(5);