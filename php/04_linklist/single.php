<?php
//单链表 基本操作
/**
 * 1.创建
 * 2.删除
 * 3.反转
 */
include "Stu.php";

//创建链表
function createStu($name_arr){
    $head=new Stu('',null);
    $cur=$head;
    foreach ($name_arr as $k=>$name){
        $stu=new Stu($name,$k);
        $cur->next=$stu;

        $cur=$stu;
    }
    return $head;
}
//遍历节点
function printNode( Stu $head ){
    $node=$head->next;
    while($node){
        echo $node->no."=>".$node->name.PHP_EOL;
        $node=$node->next;
    }
}

//删除第n个节点
function delNode(Stu $head,$n){
    $cur=$head->next;
    $prev=$head;
    while($cur){
        if($cur->no ==$n){
            $prev->next=$cur->next;
            unset($cur);
            break;
        }
        $prev=$cur;
        $cur=$cur->next;

    }
}

/**
 * @param Stu $head
 * @param $node_name
 * 查找某个元素的下标
 * 没有的话返回-1
 */
function findNode(Stu $head,$node_name){
    $cur=$head->next;
    while($cur){
        if($cur->name==$node_name){
            return $cur;
        }

        $cur=$cur->next;
    }
    return -1;
}
//反转
function reverse($head){
    $cur=$head->next;
    $prev=$head;

    while($cur){
        $next=$cur->next; //保存当前操作的节点的之前的next
        if($prev==$head){   //说明是第一个元素
            $cur->next=null; //修改当前节点的next为它之前的一个
        }else{      //不是第一个元素
            $cur->next=$prev;
        }
        $prev=$cur;
        $cur=$next;
    }
    $head->next=$prev;
}

/**
 * 反转操作要点
 * 遍历到当前节点curl时 知道其prev和next,保存next,然后改变原本next
 * 然后把要操作的节点后移即cur=next,不过在这之前需要把下一个节点的prev设置为当前节点即(prev=cur)
 * 操作时注意头结点，和之前的最后一个节点
 */

$head=createStu(["aa","b","c","d","php","go","eee"]);
//$head=createStu(["aa"]);

printNode($head);
//delNode($head,2);
//echo '######### delete no=2'.PHP_EOL;
//printNode($head);
//print_r(findNode($head,'php'));


reverse($head);
echo '########REverse####'.PHP_EOL;
printNode($head);