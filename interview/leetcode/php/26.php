<?php
//删除排序数组中的重复项 

function removeDuplicates(&$nums) {
     $nums=array_unique($nums);
     return count($nums);   
}

?>
