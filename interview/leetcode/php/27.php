<?php
//https://leetcode-cn.com/problems/remove-element/    移除元素

function removeElement(&$nums, $val) {
    $len=0;
	foreach($nums as $k=>$v){
	    if($v==$val){
	        unset($nums[$k]);
	    }else{
	        $len++;
	    }
	} 
	$nums= array_values($nums);
	return $len;
}


?>