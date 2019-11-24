<?php

/**
采用递归方式的合并
*/

class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val) { 
     	$this->val = $val; 
     }
  }

 $l1=new ListNode(1);
 $l1->next=new ListNode(3);
 $l1->next->next=new ListNode(5);
 $l1->next->next->next= new ListNode(7);

 $l2=new ListNode(2);
 $l2->next=new ListNode(4);


function mergeTwoLists($l1, $l2) {
    echo debugShow($l1)."     ".debugShow($l2).PHP_EOL;
   if(empty($l1)){
        return $l2;
   }
   if(empty($l2)){
        return $l1;
   }
   if($l1->val<$l2->val){
        $l1->next=mergeTwoLists($l1->next,$l2);
        return $l1;
   }else{
        $l2->next=mergeTwoLists($l1,$l2->next);
        return $l2;
   }

}
// print_r($l1);
// print_r($l2);
$l3=mergeTwoLists($l1,$l2);
print_r($l3);

function debugShow($list){
    $s='';
    while($list){
        $s.=$list->val.",";
        $list=$list->next;
    }
    return trim($s,',');
}


?>