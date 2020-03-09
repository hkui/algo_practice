<?php

/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/8
 * Time: 20:58
 * https://leetcode-cn.com/problems/sliding-window-maximum/
 * 滑动窗口最大值
 * 滑动窗口 + 双端队列
 *
 */
class Solution
{
    public $dequeue = [];
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k)
    {
        $n = count($nums);
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            if ($i < $k - 1) {
                $this->pushDequeue($nums[$i]);
            } else {
                $this->pushDequeue($nums[$i]);
                array_push($res, $this->max());
                $this->popDequeue($nums[$i - $k + 1]);
            }
        }
        return $res;
    }
    public function pushDequeue($val)
    {

        while (count($this->dequeue) > 0 && $this->dequeue[count($this->dequeue) - 1] < $val) {
            array_pop($this->dequeue);
        }
        array_push($this->dequeue, $val);
    }

    public function popDequeue($val)
    {
        if (count($this->dequeue) > 0 && $this->dequeue[0] == $val) {
            array_shift($this->dequeue);
        }
    }
    public function max()
    {
        return $this->dequeue[0];
    }
}
$s=new Solution();
$nums = [1,3,-1,-3,5,3,6,7];
$k=3;
$nums=[1,-1];$k=1;
$res=$s->maxSlidingWindow($nums,$k);
print_r($res);
