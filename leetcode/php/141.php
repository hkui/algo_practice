<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/6
 * Time: 8:41
 * 环形链表
 * 判断是否有环
 */

include './include/common.php';
/**
 * @param ListNode $head
 * @return Boolean
 */
function hasCycle($head) {
    if(empty($head)) return false;
    $slow=$head;
    $quick=$head;
    while($quick){
        $slow=$slow->next;
        $quick=$quick->next;
        if(empty($quick)){
            return false;
        }
        $quick=$quick->next;
        if($slow == $quick){
            return true;
        }
    }
    return false;
}
$head=createNodeList([1,2,3]);

print_r($head);
//$head->next->next=$head;

$r=hasCycle($head);
var_dump($r);

