<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/9/22
 * Time: 22:31
 */

/**
 * @param String $A
 * @param String $B
 * @return Boolean
 * 方法1
 */
function rotateString($A, $B) {
    $len=strlen($A);
    $lenB=strlen($B);
    if($lenB!=$len) return false;
    $next=[];
    for($i=0;$i<$len-1;$i++){
        $s=$A{$i};
        $sNext=$A{$i+1};
        $next[$s][]=$sNext;
    }
    $next[$A{$i}][]=$A{0};


    for($j=0;$j<$lenB-1;$j++){
        $s=$B{$j};
        $sNext=$B{$j+1};
        if(empty($next[$s]) ||!in_array($sNext,$next[$s])){
            return false;
        }
    }
    return true;

}
$tests=[
    ["abcab",'babca'],
    ["clrwmpkwru","wmpkwruclr"],

];

foreach ($tests as $t){
    $r=rotateString($t[0],$t[1]);
    var_dump($r);
}
