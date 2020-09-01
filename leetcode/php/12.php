<?php
//整数转罗马数字   https://leetcode-cn.com/problems/integer-to-roman/     1 到 3999
//13个


function intToRoman($num) {
      	$arr=[
			 1000=>'M',
			 900=>'CM',
			 500=>'D',
			 400=>'CD',
			 100=>'C',
			 90=>'XC',
			 50=>'L',
			 40=>'XL',
			 10=>'X',
			 9=>'IX',
			 5=>'V',
			 4=>'IV',
			 1=>'I'
			]; 
			$s=''; 
			while($num>0){
				foreach ($arr as $key => $value) {
					if($num>=$key){
						$s.=$value;
						$num-=$key;
						break ;
					}else{
						unset($arr[$key]);
					}
				}
			}
			return $s;


}
$test=[
	3,4,9,58
];
foreach ($test as  $value) {
	echo intToRoman($value).PHP_EOL;
}









?>