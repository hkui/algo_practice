<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/10
 * Time: 10:45
 * LRU缓存机制
 */

include './include/common.php';

class LRUCache {
    public $capacity;
    public $map=[];
    public $head; /* @var DoubleLinkList $head*/
    public $tail; /* @var DoubleLinkList $tail*/
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity=$capacity;
        $this->head=new DoubleLinkList(0,0);
        $this->tail=new DoubleLinkList(0,0);
        $this->head->next=$this->tail;
        $this->tail->prev=$this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(!isset($this->map[$key])){
            return -1;
        }
        $node=$this->map[$key];
        $first=$this->head->next;
        if($first==$node){
            return $node->val;
        }
        //把Node从之前的地方移出
        $nodePrev=$node->prev;
        $nodeNext=$node->next;

        $nodePrev->next=$nodeNext;
        $nodeNext->prev=$nodePrev;

        //把node插入到first之前
        $this->head->next=$node;
        $node->next=$first;
        $first->prev=$node;
        return $node->val;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        //新增的
        if(!isset($this->map[$key])){
            $node=new DoubleLinkList($key,$value);
            $node->next=$this->head->next;
            $node->prev=$this->head;

            $this->head->next->prev=$node;
            $this->head->next=$node;

            $this->map[$key]=$node;
            $this->removeLast();
            return;
        }
        //存在过
        $node=$this->map[$key];
        $first=$this->head->next;
        //已经在表头
        if($first==$node){
            $node->val=$value;
            $this->map[$key]=$node;
            return;
        }
        $node->val=$value;

        //把Node从之前的地方移出
        $nodePrev=$node->prev;
        $nodeNext=$node->next;

        $nodePrev->next=$nodeNext;
        $nodeNext->prev=$nodePrev;

        //把node插入到first之前
        $this->head->next=$node;
        $node->next=$first;
        $first->prev=$node;

        $this->map[$key]=$node;

    }
    public function removeLast(){
        if(count($this->map)>$this->capacity){
            $last=$this->tail->prev;
            $last->prev->next=$this->tail;
            $this->tail->prev=$last->prev;
            unset($this->map[$last->key]);
        }
    }
}
$lru=new LRUCache(2);
$lru->put(2,1);
$lru->put(1,1);
//print_r($lru->head);die;

$lru->put(2,3);


print_r($lru->get(1));
print_r($lru->get(2));

