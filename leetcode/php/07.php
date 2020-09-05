<?php
//整数反转
function reverse($x) {
	$max=pow(2,31);
	$min=-pow(2,31);
	$flag=$x>0?1:-1;
	
	$rev=0;
	while($x!=0){
		$last=$x%10;
		$x=intval($x/10);
		if($flag>0){
		    if ($max-$last<10*$rev){
		        return 0;
            }
        }else{
		    if($min-$last>10*$rev){
		        return 0;
            }
        }
		
		$rev=$rev*10+$last;

	}
	return $rev;    
}

echo reverse(-123);

?>