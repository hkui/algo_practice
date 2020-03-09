```php
//Rabin-Karp

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
		
		$hash_table=[];
		$hash_table[0]=$this->hash($haystack,0,$len2-1);
		$needle_hash=$this->hash($needle,0,$len2-1);
		if($hash_table[0] ==$needle_hash && $needle==$this->substr($haystack, 0,$len2-1)){
			return 0;
		}
		//这里需要注意 len1=1的情况，上面的判断
		for($i=1;$i<$len1-$len2+1;$i++){
			$hash_i=$hash_table[$i-1]-$this->hash($haystack,$i-1,$i-1)+$this->hash($haystack,$i+$len2-1,$i+$len2-1);
			$hash_table[$i]=$hash_i;
			//hash值等
			if($hash_i==$needle_hash && $needle ==$this->substr($haystack, $i,$i+$len2-1)){
				return $i;
			}
			continue;
		}
		return -1;

	}

	public function hash($str,$start,$end){
		$key=0;
		for($i=$start;$i<=$end;$i++){
			$key+=ord($str[$i]);
		}
		return $key;
	}
	public function substr($str,$start,$end){
		$s='';
		for($i=$start;$i<=$end;$i++){
			$s.=$str[$i];
		}
		return $s;
	}

}
```