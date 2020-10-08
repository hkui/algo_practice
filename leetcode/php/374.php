<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/9
 * Time: 0:20
 */
class Solution {
    public $pick=6;
    public function guess($n){
        if($n==$this->pick) return 0;
        if($n>$this->pick) return -1;
        return 1;
    }
    /**
     * @param  Integer  $n
     * @return Integer
     */
    function guessNumber($n) {
        if($this->guess($n)==0){
            return $n;
        }
        $low=0;
        $high=$n;
        while($low<=$high){
            $mid=$low+(($high-$low)>>1);
            if($this->guess($mid)==0){
                return $mid;
            }
            //猜的值比实际值大了
            if($this->guess($mid)<0){
                $high=$mid-1;
            }else{
                $low=$mid+1;
            }
        }
        return -1;
    }


}
$so=new Solution();
echo $so->guessNumber(6);