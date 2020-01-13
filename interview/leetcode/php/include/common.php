<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/1/6
 * Time: 22:17
 */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

function createNodeList($arr){
    $head=new ListNode(null);

    $cur=$head;
    foreach ($arr as $v){
        $node=new ListNode($v);
        $cur->next=$node;
        $cur=$cur->next;


    }
    return $head->next;
}

function nodesShow($node){
    $str='';
    while($node){
        $str.=$node->val.'=>';
        $node=$node->next;
    }
    return trim($str,'=>');
}