<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/21
 * Time: 21:48
 */
class SNode{
    public $data;
    public $next=[];
    public function __construct($data=null)
    {
        $this->data=$data;
    }
    public function getMaxLevel(){
        return count($this->next)-1;
    }

}
class Skiplist {
    public $indexLevel;

    public $head;
    /**
     */
    function __construct($indexLevel) {
        $this->indexLevel=max($indexLevel,0);
        $this->head=new SNode();
    }

    /**
     * @param Integer $target
     * @return Boolean
     */
    function search($target) {
        for ($level = $this->head->getMaxLevel(), $node = $this->head; $level >= 0; $level--) {
            while (isset($node->next[$level]) && $target < $node->next[$level]->data) {
                $node = $node->next[$level];
            }
            if (isset($node->next[$level]) && $target == $node->next[$level]->data) {
                return $node->next[$level];
            }
        }
        return false;
    }
    /**
     * @param Integer $num
     * @return NULL
     */
    function add($num) {
        $newNode=new SNode($num);
        for (
             $level=$this->getRandomLevel(),$node=$this->head;
             $level>=0;
             $level--
        ){

            while(isset($node->next[$level]) && $num<$node->next[$level]->data){
                $node=$node->next[$level];
            }
            if(isset($node->next[$level])){
               $newNode->next[$level]=$node->next[$level] ;
            }
            $node->next[$level]=$newNode;
        }
        return $newNode;


    }

    /**
     * @param Integer $num
     * @return Boolean
     */
    function erase($num) {
        $deleted = false;
        for ($level = $this->head->getMaxLevel(), $node = $this->head; $level >= 0; $level--) {
            while (isset($node->next[$level]) && $num < $node->next[$level]->data) {
                $node = $node->next[$level];
            }
            if (isset($node->next[$level]) && $num == $node->next[$level]->data) {
                $node->next[$level] = isset($node->next[$level]->next[$level]) ?
                    $node->next[$level]->next[$level] : null;
                $deleted = true;
            }
        }
        return $deleted;
    }

    protected function getRandomLevel()
    {
        return mt_rand(0, $this->indexLevel);
    }
}

$indexLevel = 2;

$skipList = new SkipList($indexLevel);

for ($i = 3; $i >= 0; $i--) {
    $skipList->add($i);
}
print_r($skipList->head);
var_dump($skipList->search(6));