```php
//BF 算法中的 BF 是 Brute Force 的缩写，中文叫作暴力匹配算法，也叫朴素匹配算法
class Solution{
	function strStr($haystack,$needle){
		$len1=strlen($haystack);
		$len2=strlen($needle);
		if($len2==0){
			return 0;
		}
		if($len1<$len2){
			return -1;
		}
		$index=-1;
		$j=0;
		for($i=0;$i<$len1;$i++){
			if($haystack[$i]==$needle[$j]){
				if($j==0){
					$index=$i;
				}
				
				$j++;
				if($j>=$len2){
					return $index;
				}
			}else{
				if($j>0){
					$i=$index; //从index起
					$j=0;
					$index=-1;
				}
				
			}
		}
		//注意
		if($j!=$len2){
			return -1;
		}
		return $index;

	}
}

$tests=[
	["abcdef","de"],
	["abcdef","b"],
	["abcdef","deg"],
	["hello","ll"],
	["mississippi","issip"],
	["mississippi","issipi"],
];
$s=new Solution();
foreach ($tests as $v) {
	echo $s->strStr($v[0],$v[1]).PHP_EOL;
}
?>


```