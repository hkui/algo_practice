<?php

class heap
{
    public $dataArr = [];
    public $count = 0;
    public $size; //求top n时使用

    public function __construct($size = 10)
    {
        $this->size = $size;
    }

    /**
     * @param $data
     * 插入并堆化
     */
    public function insert($data, $small = false)
    {
        if ($this->count >= $this->size) {
            return false;
        }
        $this->dataArr[$this->count + 1] = $data;
        $this->count++;
        if ($small) {
            $this->smallHeapLast();
        } else {
            $this->heapdownToUp();
        }
    }


    //只插入
    public function insertOnly($data)
    {
        if ($this->count >= $this->size) {
            return false;
        }
        $this->dataArr[$this->count + 1] = $data;
        $this->count++;
    }
    //大根堆，根最大,    插入节点后放到数组最后面，然后从插入的节点自下而上开始堆化
    //这里只堆化插入元素相关的节点(就是说，如果没插入这个元素，这个是一个堆)
    public function heapdownToUp()
    {
        $i = $this->count;
        while (intval($i / 2) > 0 && $this->dataArr[$i] > $this->dataArr[intval($i / 2)]) {
            $tmp = $this->dataArr[$i];
            $this->dataArr[$i] = $this->dataArr[intval($i / 2)];
            $this->dataArr[intval($i / 2)] = $tmp;
            $i = $i / 2;
        }
    }

    /**
     * 删除堆顶的元素
     */
    public function deleteFirst()
    {
        $root = $this->dataArr[1];
        $last = array_pop($this->dataArr);
        if ($this->count < 1) {
            return null;
        }
        $this->count--;
        $i = 1;
        $this->dataArr[$i] = $last;

        //至上而下的堆化
        while (true) {
            //找出1个最小树中最大的
            $maxPos = $i;
            $left = 2 * $maxPos;
            $right = $left + 1;
            if ($left <= $this->count) {
                if ($this->dataArr[$maxPos] < $this->dataArr[$left]) {
                    $maxPos = $left;
                }

            }
            if ($right <= $this->count) {
                if ($this->dataArr[$maxPos] < $this->dataArr[$right]) {
                    $maxPos = $right;
                }
            }
            if ($maxPos == $i) { //在3个个节点间没发生替换 满足堆的性质 退出循环
                break;
            }

            $tmp = $this->dataArr[$maxPos];
            $this->dataArr[$maxPos] = $this->dataArr[$i];
            $this->dataArr[$i] = $tmp;
            $i = $maxPos;
        }
        return $root;

    }

    /**
     * 元素从后到前，从上到下堆化
     * 从第一个非叶子节点开始
     * 大根堆的
     */
    protected function heapUpToDown($i)
    {
        $maxPos = $i;
        while (true) {
            if (2 * $i <= $this->count) {
                if ($this->dataArr[$maxPos] < $this->dataArr[2 * $i]) {
                    $maxPos = 2 * $i;
                }
            }
            if (2 * $i + 1 <= $this->count) {
                if ($this->dataArr[$maxPos] < $this->dataArr[2 * $i + 1]) {
                    $maxPos = 2 * $i + 1;
                }
            }
            //不需要交换
            if ($i == $maxPos) {
                break;
            }
            $tmp = $this->dataArr[$maxPos];
            $this->dataArr[$maxPos] = $this->dataArr[$i];
            $this->dataArr[$i] = $tmp;
            //继续往下堆化
            $i = $maxPos;

        }
    }

    //整体堆化
    public function doHeapUpToDown()
    {
        for ($i = intval($this->count / 2); $i >= 1; $i--) {
            $this->heapUpToDown($i);
        }
    }

    /**
     * 堆排序
     * 把堆顶部的元素和数组尾部元素交换
     */
    public function heapSort()
    {
        $sorted = 0;//已经有序的个数
        while ($sorted < $this->count) {
            $i = 1;
            $head = $this->dataArr[$i];
            $this->dataArr[$i] = $this->dataArr[$this->count - $sorted];
            $this->dataArr[$this->count - $sorted] = $head;
            $sorted++;

            while (true) {
                $maxPos = $i;
                if (2 * $i <= $this->count - $sorted && $this->dataArr[$maxPos] < $this->dataArr[2 * $i]) {
                    $maxPos = 2 * $i;
                }
                if (2 * $i + 1 <= $this->count - $sorted && $this->dataArr[$maxPos] < $this->dataArr[2 * $i + 1]) {
                    $maxPos = 2 * $i + 1;
                }
                if ($i == $maxPos) {
                    break;
                }
                $tmp = $this->dataArr[$i];
                $this->dataArr[$i] = $this->dataArr[$maxPos];
                $this->dataArr[$maxPos] = $tmp;
                $i = $maxPos;
            }
        }

    }

    /**
     *小顶堆 堆化
     * 插入时
     * 堆化最后1个元素
     */
    public function smallHeapLast()
    {
        $i = $this->count;
        while (true) {
            $smallPos = $i;
            $parent = intval($i / 2);
            if ($parent >= 1) {
                if ($this->dataArr[$smallPos] < $this->dataArr[$parent]) {
                    $smallPos = $parent;
                }
            }
            if ($smallPos == $i) {
                break;
            }
            $tmp = $this->dataArr[$smallPos];
            $this->dataArr[$smallPos] = $this->dataArr[$i];
            $this->dataArr[$i] = $tmp;
            $i = $smallPos;
        }
    }

    /**
     * 堆化根部元素(第一个元素)
     */
    public function smallHeapFirst()
    {
        $i = 1;
        while (true) {
            $smallpos = $i;
            $left = 2 * $i;
            if ($left <= $this->count) {
                if ($this->dataArr[$smallpos] > $this->dataArr[$left]) {
                    $smallpos = $left;
                }
            }
            $right = $left + 1;
            if ($right <= $this->count) {
                if ($this->dataArr[$smallpos] > $this->dataArr[$right]) {
                    $smallpos = $right;
                }
            }
            if ($smallpos == $i) {
                break;
            }
            $tmp = $this->dataArr[$i];
            $this->dataArr[$i] = $this->dataArr[$smallpos];
            $this->dataArr[$smallpos] = $tmp;
            $i = $smallpos;
        }

    }

    /**
     * @param $data
     */
    public function topn($data)
    {
        if ($this->count >= $this->size) {
            if ($data > $this->dataArr[1]) {
                $this->dataArr[1] = $data;
                $this->smallHeapFirst();
            }
        } else {
            $this->dataArr[$this->count + 1] = $data;
            $this->count++;
            $this->smallHeapLast();

        }
        return $this->dataArr[1];

    }

}




