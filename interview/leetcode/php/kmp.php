<?php
class Solution{
	
	public function strStr($haystack,$needle){
		$len1=strlen($haystack);
		$len2=strlen($needle);
		if($len2==0){
			return 0;
		}
		if($len1<$len2){
			return -1;
		}
		$nextArr=$this->nextArr($needle);
		print_r($nextArr);die;
	

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
				if($i+$len2>$len1){
					return -1;
				}	
			}
		}
		if($j<=$len2){
			return -1;
		}
		return $index;
	}
	
	public function next($str){
		$len=strlen($str);
		$compareLen=intval($len/2);
		$leftStr='';
		$rightStr='';
		$commonLen=0;
		$i=0;
		while($i<$compareLen){
			$leftStr.=$str[$i];
			$rightStr=$str[$len-$i-1].$rightStr;
			if($leftStr==$rightStr){
				$commonLen=$i+1;
			}
			$i++;
		}
		return $commonLen;

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



$s=new Solution();
$tests=[
	// ["abcdef","de",3], 
	// ["abcdef","b",1],
	// ["abcdef","deg",-1],
	// ["hello","ll",2],
	// ["mississippi","issip",4],
	// ["mississippi","issipi",-1],
	[file_get_contents('./data/haystack'),file_get_contents('./data/needle'),-1]
];
// $r=$s->nextArr('de');
// print_r($r);
// die;



foreach ($tests as $v) {
	var_dump($s->strStr($v[0],$v[1])==$v[2]);
}




?>