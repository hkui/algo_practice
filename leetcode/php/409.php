<?php
/**
 * Date: 2020/1/19
 * Time: 10:17
 * 最长回文串
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $count=[];
        $len=strlen($s);
        for($i=0;$i<$len;$i++){
            $key=$s{$i};
            if(isset($count[$key])){
                $count[$key]++;
            }else{
                $count[$key]=1;
            }

        }
        $n=0;
        $mark=false;

        foreach ($count as $key=>$c){
            if($c%2==0){
                $n+=$c;
            }else{
                if($c>=1){
                    $mark=true;
                }
                $n+=$c-1;
            }
        }
        return $n+($mark?1:0);
    }
}

$so=new Solution();

$tests=[
    'dabcccab',
    'a',
    'abc',
    'aAb',
    'civilwartestingwhetherthatnaptionoranynartionsoconceivedandsodedicatedcanlongendureWeareqmetonagreatbattlefiemldoftzhatwarWehavecometodedicpateaportionofthatfieldasafinalrestingplaceforthosewhoheregavetheirlivesthatthatnationmightliveItisaltogetherfangandproperthatweshoulddothisButinalargersensewecannotdedicatewecannotconsecratewecannothallowthisgroundThebravelmenlivinganddeadwhostruggledherehaveconsecrateditfaraboveourpoorponwertoaddordetractTgheworldadswfilllittlenotlenorlongrememberwhatwesayherebutitcanneverforgetwhattheydidhereItisforusthelivingrathertobededicatedheretotheulnfinishedworkwhichtheywhofoughtherehavethusfarsonoblyadvancedItisratherforustobeherededicatedtothegreattdafskremainingbeforeusthatfromthesehonoreddeadwetakeincreaseddevotiontothatcauseforwhichtheygavethelastpfullmeasureofdevotionthatweherehighlyresolvethatthesedeadshallnothavediedinvainthatthisnationunsderGodshallhaveanewbirthoffreedomandthatgovernmentofthepeoplebythepeopleforthepeopleshallnotperishfromtheearth'

];
foreach ($tests as $s){
    echo $s."==>".$so->longestPalindrome($s).PHP_EOL;
}
