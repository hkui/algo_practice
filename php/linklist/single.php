<?php
//单链表
class Stu{
    public $name;
    public $no;
    public $next;
    public function __construct($name,$no)
    {
        $this->name=$name;
        $this->no=$no;
    }
}
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

$head=createStu(["a","b","c","d"]);
printNode($head);
delNode($head,2);
echo '######### delete no=2'.PHP_EOL;
printNode($head);