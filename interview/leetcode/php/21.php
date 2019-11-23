<?php
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
    while($l1 && $l2){
    	if($l1->val<$l2->val){
    		$tmp=new ListNode($l1->val);
    		if(!isset($node)){
    			$node=$tmp;
    			$cur=$node;
    		}else{
    			$cur->next=$tmp;
    			$cur=$cur->next;
    		}
    		
    		$l1=$l1->next;
    	}else{
    		$tmp=new ListNode($l2->val);
    		if(!isset($node)){
    			$node=$tmp;
    			$cur=$node;
    		}else{
    			$cur->next=$tmp;
    			$cur=$cur->next;
    		}
    		
    		$l2=$l2->next;
    	}
    }
    
    if($l1){
    	if($cur){
    		$cur->next=$l1;
    	}else{
    		return $l1;
    	}
    	
    }
    if($l2){
    	if($cur){
    		$cur->next=$l2;
    	}else{
    		return $l2;
    	}
    	
    }
    
    return $node;
}
// print_r($l1);
// print_r($l2);
$l3=mergeTwoLists($l1,$l2);
print_r($l3);


?>