<?php
//删除排序数组中的重复项 

function removeDuplicates1(&$nums) {
     $len=count($nums);
     for($i=0;$i<$len-1;$i++){
     	while (true) {
     		if($nums[$i+1] ==$nums[$i]){
	     		for($j=$i+1;$j<$len-1;$j++){
	     			$nums[$j]=$nums[$j+1];
	     		}
	     		$len--;
     		}else{
     			break;
     		}
     	}
     	
     }
     return $len;
}

function removeDuplicates(&$nums) {
     $len=count($nums);
     $i=0;
     while($i<$len-1){
     	if($nums[$i+1] ==$nums[$i]){
     		for($j=$i;$j<$len-1;$j++){
     			$nums[$j]=$nums[$j+1];
     		}
     		$len--;
 		}else{
 			$i++;
 		}
     }
     
     return $len;
}

$test=[0,0,1,1,1,2,2,3,3,4];
$r=removeDuplicates($test);
print_r($test);
?>
