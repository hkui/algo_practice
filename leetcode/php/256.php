<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/10/31
 * Time: 17:52
 * 粉刷房子
 */
class Solution {

    /**
     * @param Integer[][] $costs
     * @return Integer
     */
    function minCost($costs) {
        $len=count($costs);
        if($len==0) return 0;
        for($n=$len-2;$n>=0;$n--){
            $costs[$n][0]+=min($costs[$n+1][1],$costs[$n+1][2]);
            $costs[$n][1]+=min($costs[$n+1][0],$costs[$n+1][2]);
            $costs[$n][2]+=min($costs[$n+1][0],$costs[$n+1][1]);
        }
        return min($costs[0][0],$costs[0][1],$costs[0][2]);
    }
}

$costs=[[17,2,17],[16,16,5],[14,3,19]];
$so=new Solution();
echo $so->minCost($costs);


















