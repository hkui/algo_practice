<?php
//删除排序数组中的重复项,快慢指针

function removeDuplicates(&$nums) {
     $len=count($nums);
     if($len==0){
     	return 0;
     } 
     $i=0;
     for($j=1;$j<$len;$j++){
     	if($nums[$j]!=$nums[$i]){
     		$nums[$i+1]=$nums[$j];
     		$i++;
     		
     	}
     } 
     return $i+1;
}

$tests=[
	[1,2,2,3,4,4,4,5],
	[1,1,2,3,4,4,4,4]
];
foreach ($tests as $v) {
	echo removeDuplicates($v).PHP_EOL;
}


?>
