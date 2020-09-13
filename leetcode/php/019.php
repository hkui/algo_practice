<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/13
 * Time: 20:48
 */

include './include/common.php';
/**
 * @param ListNode $head
 * @param Integer $n
 * @return ListNode
 * 2 次遍历法
 */

function removeNthFromEnd($head, $n) {
    $cur=$head;
    $len=0;
    while($cur){
        $len++;
        $cur=$cur->next;
    }
    $m=$len-$n+1;

    $cur=$head;
    $prev=null;
    for($i=1;$i<=$len;$i++){
        if($m==$i){
            if($prev){
                $prev->next=$cur->next;
            }else{
                $head=$cur->next;
                break;
            }
        }else{
            $prev=$cur;
            $cur=$cur->next;
        }

    }
    return $head;
}

/**
 * @param $head
 * @param $n
 * @return mixed
 *
 * 指针法 规律啊
 * 1,2,3,4,5,6   n=2
 * 整数第n个节点到链表末尾=第一个节点到倒数第n个接覅
 * 即1到5的距离=2到末尾6的距离
 *
 *
 */
function removeNthFromEnd1($head, $n) {
    $leftN=$head;
    //找到正数第$n个节点
    for($i=1;$i<$n;$i++){
        $leftN=$leftN->next;
    }

    $fromN=$leftN;//从正数第n位开始
    $from0=$head; //从头开始
    $prev=null;//保存从头开始的前驱
    while($fromN){
        $fromN=$fromN->next;
        if(empty($fromN)){
            break;
        }
        $prev=$from0;
        $from0=$from0->next;
    }
    //此时from0是倒数第n个节点
    //删除头时特殊处理
    if(empty($prev)){
        $head=$head->next;
    }else{
        $prev->next=$from0->next;
    }
    return $head;
}


$node=createNodeList([1,2,3,4,5,6]);
$r=removeNthFromEnd1($node,6);
print_r($r);


