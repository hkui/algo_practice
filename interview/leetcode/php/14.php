<?php

function longestCommonPrefix($strs) {
   $prefix='';	
   $first=$strs[0];
   $first_len=strlen($first);

   $strs_num=count($strs);
   for($i=0;$i<$first_len;$i++){
   		$tmp=$prefix.$first[$i];

   		for($j=1;$j<$strs_num;$j++){
   			if(stripos($strs[$j], $tmp)!==0){
  				return $prefix;
   				
   			}
   		}
   		$prefix=$tmp;
   }
   return $prefix;
}

$strs=["flower","flow","flight"];
echo longestCommonPrefix($strs);

?>