<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/13
 * Time: 21:32
 * 给出一个区间的集合，请合并所有重叠的区间。
 *
 * 示例 1:
 *
 * 输入: [[1,3],[2,6],[8,10],[15,18]]
 * 输出: [[1,6],[8,10],[15,18]]
 * 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
 *
 *
 * 链接：https://leetcode-cn.com/problems/merge-intervals
 */

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals)
    {
        $res = [];
        $len = count($intervals);
        if ($len < 2) {
            return $intervals;
        }

        $index = [];
        foreach ($intervals as $arr) {
            $index[] = $arr;//注意不能用$arr[0]当key
        }
        sort($index);

        $res[]=$index[0];
        for ($i = 1; $i <= $len - 1;$i++) {
            $indexI=$index[$i];
            $endRes=end($res);
            //[1,3] ,[4,5] 4>3 直接把[4,5]插入
            if($endRes[1]<$indexI[0]){
                $res[]=$indexI;

            }elseif ($endRes[1]>=$indexI[0] && $endRes[1]<=$indexI[1]){
                //[1,3] [2,5]
                $res[count($res)-1][1]=$indexI[1];
            }else{
                //[1,5] [2,4]
            }
        }

        return $res;

    }

}

$tests = [
//    [[1, 3], [2, 6], [4,10]],
//
//    [[4, 7], [1, 3]],
    [[2,3],[5,5],[2,2],[3,4],[3,4]]

];
$so = new Solution();
foreach ($tests as $t) {
    $r = $so->merge($t);
    print_r($r);
}
