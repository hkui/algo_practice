<?php
/**
 * 两数相加
 * https://leetcode-cn.com/problems/add-two-numbers/
 *
 *
 */
include "include/common.php";


class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {

        $low = 0;//进位
        while ($l1 || $l2) {
            $num = 0;
            $num += $low;

            if ($l1) {
                $num = $num + $l1->val;
                $l1 = $l1->next;
            }
            if ($l2) {
                $num = $num + $l2->val;
                $l2 = $l2->next;
            }
            if ($num > 9) {
                $num = $num % 10;
                $low = 1;
            } else {
                $low = 0;
            }
            if (!isset($head)) {
                $head = $tmp = new ListNode($num);

            } else {
                $tmp->next = new ListNode($num);
                $tmp = $tmp->next;
            }
        }
        //l1与l2一样长 且有进位
        if($low>0){
            $tmp->next=new ListNode($low);
        }
        return $head;

    }

}



$l1 = new ListNode(2);
$l1->next = new ListNode(4);
//$l1->next->next=new ListNode(3);

$l2 = new ListNode(5);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(4);

$s = new Solution();
$l3 = $s->addTwoNumbers(new ListNode(5), new ListNode(5));
print_r($l3);


?>