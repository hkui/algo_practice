<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/9
 * Time: 23:28
 */

/**
 * @param String[] $strs
 * @return String
 */
function longestCommonPrefix($strs) {
    $len=count($strs);
    if($len<1){
        return '';
    }
    $first=$strs[0];
    $firstLen=strlen($first);
    $prefix='';
    for($i=0;$i<$firstLen;$i++){
        $prefix=substr($first,0,$i+1);

        for($j=1;$j<$len;$j++){
            if(strpos($strs[$j],$prefix)!==0){
                return substr($prefix,0,strlen($prefix)-1);
            }
        }
    }
    return $prefix;
}
$strs=["flower","flow","flight"];
echo longestCommonPrefix($strs);
/**
 * 选定第一个作为基准
 * 取第一个的子串，逐渐往后延，然后依次判断是否在后面的字符里
 * O(mn)
 * O(1)
 */