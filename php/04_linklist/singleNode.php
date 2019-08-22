<?php

/**
 * Class singleNode
 * 单个节点的结构
 */
class singleNode
{
    public $name;
    public $no;
    public $next;

    public function __construct($name, $no = 0)
    {
        $this->name = $name;
        $this->no = $no;

    }
}

/**
 * //单链表 基本操作
 * 1.创建
 * 2.删除
 * 3.反转
 * 4.lru
 */
class nodeList
{
    public $head;
    public $len;  //总长度，头不算
    public $used;   //已经使用了的长度

    //创建链表 返回nodelist
    public static function createNode($name_arr, $len)
    {
        $head = new singleNode('', null);
        $cur = $head;
        $nodeList = new self();
        $nodeList->head = $head;
        $nodeList->len = $len;
        foreach ($name_arr as $k => $name) {
            if ($nodeList->used >= $nodeList->len) {
                break;
            }
            $node = new singleNode($name, $k);
            $cur->next = $node;
            $cur = $node;
            $nodeList->used++;
        }
        return $nodeList;
    }

    //遍历节点
    public function printNode()
    {
        $node = $this->head->next;
        while ($node) {
            echo $node->name . " ";
            $node = $node->next;
        }
        echo PHP_EOL;
    }
    //反转

    /**
     * 反转操作要点
     * 遍历到当前节点curl时 知道其prev和next,保存next,然后改变原本next
     * 然后把要操作的节点后移即cur=next,不过在这之前需要把下一个节点的prev设置为当前节点即(prev=cur)
     * 操作时注意头结点，和之前的最后一个节点
     */
    public function reverse()
    {

        $cur = $this->head->next;
        $prev = $this->head;

        while ($cur) {
            $next = $cur->next; //保存当前操作的节点的之前的next
            if ($prev == $this->head) {   //说明是第一个节点
                $cur->next = null; //修改当前节点的next为它之前的一个
            } else {      //不是第一个元素
                $cur->next = $prev;
            }
            $prev = $cur;
            $cur = $next;
        }
        $this->head->next = $prev;
    }

    //删除name的节点
    public function delNode($name)
    {
        $cur = $this->head->next;
        $prev = $this->head;
        while ($cur) {
            if ($cur->name == $name) {
                $prev->next = $cur->next;
                unset($cur);
                $this->used--;
                break;
            }
            $prev = $cur;
            $cur = $cur->next;
        }
    }

    /**
     * @param singleNode $head
     * @param $name
     * @return bool
     * 根据名称判断是否在链表中
     */
    public function exist($name)
    {
        $cur = $this->head->next;
        while ($cur) {
            if ($name == $cur->name) {
                return true;
            }
            $cur = $cur->next;
        }

        return false;
    }

    /**
     * @param $name
     * 在链表开头插入元素
     */
    public function unshift($name)
    {
        if ($this->isFull()) {
            return;
        }
        $node = new singleNode($name);
        $node->next = $this->head->next;
        $this->head->next = $node;
        $this->used++;
    }

    /**
     * 将尾部的节点弹出
     */
    public function pop()
    {
        $cur = $this->head->next;
        $prev = $this->head;
        while ($cur) {
            if (!$cur->next) {
                $prev->next = null;
                $this->used--;
                return;
            }
            $prev = $cur;
            $cur = $cur->next;
        }

    }

    //链表是否满了
    public function isFull()
    {
        return $this->len <= $this->used ? true : false;
    }

    /**
     * @param $name
     * 越靠近链表尾部的节点是越早之前访问的
     * 当有一个新的数据被访问时，从链表头开始顺序遍历链表
     * 1.在链表里
     *      将这个节点从链表里删除,然后插入到头部
     * 2.不在链表里
     *   2.1链表已满，删除链表尾部节点，将元素插入链表头部
     *   2.2链表未满 ，将链表插入到链表的头部
     *
     */
    public function lru($name)
    {
        if ($this->exist($name)) {
            $this->delNode($name);
            $this->unshift($name);

        } else {
            //链表已满
            if ($this->isFull()) {
                $this->pop();
                $this->unshift($name);
            } else {  //链表未满
                $this->unshift($name);
            }
        }
    }

    /**
     * 查找中间节点
     * 快慢指针
     */
    public function findMiddle(){
        $fast=$this->head;
        $slow=$fast;
        while($fast && $fast->next){
            $slow=$slow->next;
            $fast=$fast->next->next;

        }
        return $slow;
    }

    /**
     * 是不是回文串
     * abcba
     * abba
     * a
     * 找到中间节点(在找到中间节点的同时反转已经遍历过的中间节点前的节点)
     */
    public function isPalindrome(){
        $fast=$this->head;
        $slow=$fast;
        $slow_prev=null;
        while($fast && $fast->next){
            $fast=$fast->next->next;
            $slow_next=$slow->next;
            if($slow_prev==$this->head){
                $slow->next=null;
            }
            $slow_prev=$slow;
            $slow=$slow_next;
        }
        return $slow;
    }
}

