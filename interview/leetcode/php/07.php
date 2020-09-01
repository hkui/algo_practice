<?php
//整数反转
function reverse($x) {
	$max=pow(2,31);
	$min=-pow(2,31);
	
	$rev=0;
	while($x!=0){
		$pop=$x%10;
		$x=intval($x/10);
		if ($rev > $max/10 || ($rev == $max / 10 && $pop > 7)) return 0;
        if ($rev < $min/10 || ($rev == $min / 10 && $pop < -8)) return 0;
		
		$rev=$rev*10+$pop;
		echo $rev.",".$pop.','.$x.PHP_EOL;
		
	}
	return $rev;    
}

echo reverse(-123);

?>