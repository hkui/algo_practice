<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/1
 * Time: 21:22
 */
include "include/common.php";

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        $queue[]=[$root,0];
        $popArr=[];
        while($queue){
            $pop=array_shift($queue);
            [$item,$level]=$pop;
            if($level>0){
                $popArr[$level][]=$item;
            }
            if(empty($item)){
                continue;
            }
            if(isset($item->left)){
                array_push($queue,[$item->left,$level+1]);
            }else{
                array_push($queue,[null,$level+1]);
            }

            if(isset($item->right)){
                array_push($queue,[$item->right,$level+1]);
            }else{
                array_push($queue,[null,$level+1]);
            }

        }
        if(empty($popArr)){
            return true;
        }
        foreach ($popArr as $levelData){
            //全为空
            if(!array_filter($levelData)){
               continue;
            }
            $len=count($levelData);
            if($len%2!=0){
                return false;
            }
            $mid=$len/2;
            for($i=0;$i<$mid;$i++){
                $left=$levelData[$i];
                $right=$levelData[$len-$i-1];
                if(
                    (empty($left) && !empty($right))
                    ||
                    (!empty($left) && empty($right))
                ){
                    return false;
                }else{

                    if($left->val!==$right->val){
                        return false;
                    }
                }

            }

        }
        return true;
    }

}


$so=new Solution();
$tests=[

//    [1,2,2,null,3,null,3],
//    [2,3,3,4,5,5,4,null,null,8,9,null,null,9,8],
    [1,2,2,3,4,4,3,5,6,7,8,8,7,6,5]
];
foreach ($tests as $v){
    $r=$so->isSymmetric(createTreesByArr($v));
    var_dump($r);
}



//[1,2,2,null,3,null,3]
//[2,3,3,4,5,5,4,null,null,8,9,null,null,9,8]



