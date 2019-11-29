<?php
class Solution{
	
	public function strStr($haystack,$needle){
		$len1=strlen($haystack);
		$len2=strlen($needle);
		$nextArr=$this->nextArr($needle);
		$index=-1;
		$j=0;
		$i=0;
		while($i<$len1){
			if($haystack[$i]==$needle[$j]){
				$index=$i-$j;
				$j++;
				if($j>=$len2){
					return $index;
				}
				$i++;
			}else{
				
				if($j>0){
					$move=$j-$nextArr[$j-1];
				}else{
					$move=1;
				}
				$j=$j-$move;
				if($j<0){
					$j=0;
					$i++;
				}
				$index=-1;
			}
		}
		if($j<=$len2){
			return -1;
		}
		return $index;
	}
	public function next($str){
		$left=[];
		$right=[];
		$common_len=0;
		$len=strlen($str);
		$tmp='';
		for($i=0;$i<$len-1;$i++){
			$tmp.=$str[$i];
			$left[$tmp]=1;
		}

		$tmp='';
		for($j=$len-1;$j>0;$j--){
			$tmp=$str[$j].$tmp;

			$right[$tmp]=1;
			if(isset($left[$tmp])){
				$common_len=strlen($tmp);
			}
		}
		return $common_len;
		
	}
	public function nextArr($str){
		$arr=[];
		$len=strlen($str);
		$tmp='';
		for($i=0;$i<$len;$i++){
			$tmp.=$str[$i];
			$arr[$i]=$this->next($tmp);
		}
		return $arr;
	}
}


$str="ABCDABD";
$s=new Solution();
$tests=[
	["abcdef","de",3], 
	["abcdef","b",1],
	["abcdef","deg",-1],
	["hello","ll",2],
	["mississippi","issip",4],
	["mississippi","issipi",-1],
];
foreach ($tests as $v) {
	echo $s->strStr($v[0],$v[1]).PHP_EOL;
}




?>