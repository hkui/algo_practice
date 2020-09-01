<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/28
 * Time: 21:39
 */
class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function CheckPermutation($s1, $s2) {
        $len1=strlen($s1);
        $len2=strlen($s2);
        if($len2!=$len1){
            return false;
        }
        for ($i=0;$i<$len1;$i++){
            if(stripos($s2,$s1{$i})===false){
                return false;
            }
        }
        for ($i=0;$i<$len2;$i++){
            if(stripos($s1,$s2{$i})===false){
                return false;
            }
        }
        return true;
    }
    function CheckPermutation1($s1, $s2) {
        $len1=strlen($s1);
        $len2=strlen($s2);
        if($len2!=$len1){
            return false;
        }
        $arr1=str_split($s1);
        $arr2=str_split($s2);
        $arr1_count=array_count_values($arr1);
        $arr2_count=array_count_values($arr2);

        $arr=array_diff_assoc($arr1_count,$arr2_count);

        return empty($arr);
    }

}


$so=new Solution();

$tests=[
    ["abcc","cbaa"],  //长度等，元素总类等，各个元素个数是否相等
    [
        "jzvthzihsvghjhbrpfhdwixmyaxjrdzfvnhpmyrbqjpdffykqgahgzpjwvouurr",
        "hhqhxjyrghjjsmduaxppwrqkikqnfdrzjowapehtbyrgrfyprrfrebzduxvvhhu"
    ],
];
foreach ($tests as $t){
    $r=$so->CheckPermutation1($t[0],$t[1]);
    var_dump($r);
}

