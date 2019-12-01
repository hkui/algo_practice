<?php
//BF 算法中的 BF 是 Brute Force 的缩写，中文叫作暴力匹配算法，也叫朴素匹配算法
class Solution{
	public $count=0;
	function strStr($haystack,$needle){
		$this->count=0;
		$len1=strlen($haystack);
		$len2=strlen($needle);
		if($len2==0){
			return 0;
		}
		if($len1<$len2){
			return -1;
		}
		//aaab,aaaa 
		if($len1==$len2){
			if($haystack!=$needle){
				return -1;
			}
		}
		$index=-1;
		$j=0;
		for($i=0;$i<$len1;){
			if($haystack[$i]==$needle[$j]){
				if($j==0){
					$index=$i;
				}
				
				$j++;
				$i++;
				if($j>=$len2){
					return $index;
				}
			}else{
				if($j>0){
					$j=0;
					$i=$index+1;
					$index=-1;
				}else{
					$i++;
				}
				/**
				移动时发现模式串已经超出了.没必要比较了
				aaab
				aaaa
				到
				aaab
				 aaaa
				*/
				if($i+$len2>$len1){
					return -1;
				}		
			}
		}

		if($j!=$len2){
			return -1;
		}
		return $index;

	}
}

$tests=[
	["abcdef","de",3], 
	["abcdef","b",1],
	["abcdef","deg",-1],
	["hello","ll",2],
	["mississippi","issip",4],
	["mississippi","issipi",-1],
	[file_get_contents('./data/haystack'),file_get_contents('./data/needle'),-1]
];
$s=new Solution();
foreach ($tests as $v) {
	 var_dump($s->strStr($v[0],$v[1])==$v[2]);
}

?>

