<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/3/30
 * Time: 21:20
 */
class Solution {

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path) {
        $path=trim($path,"/");
        $stack=[];
        $path_arr=explode('/',$path);
        $path_arr=array_filter($path_arr);

        foreach ($path_arr as $s){
            if($s=='.'){
                continue;
            }elseif ($s=='..'){
                if(!empty($stack)){
                    array_pop($stack);
                }
            }else{
                array_push($stack,$s);
            }
        }
        return "/".join('/',$stack);
    }
}
$tests=[
    "/home/",
    '/../',
    "/home//foo/",
    "/a/./b/../../c/",
    "/a/../../b/../c//.//",
    '/a//b////c/d//././/..'
];
$so=new Solution();
foreach ($tests as $path){
    echo  $path."====>".$so->simplifyPath($path).PHP_EOL;
}


