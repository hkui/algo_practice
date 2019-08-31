#### 基于栈的后进先出特性

验证大小中括号是否成对闭合匹配
```
()          合法
)(          不合法
({}[])      合法
((({})))    合法
({)}        不合法
```
问题分析
当加入一个元素，如果是右括号，一定会比对它前面是否有对应的左括号，如果有则出栈，如果没有
则直接结束

要考察的元素 是最后一个插入的，很符合栈的性质

因为php数组天生支持栈的操作

要建立左右括号对应的关系(dict)

```php
<?php
$dict=[
    ")"=>"(",
    "]"=>"[",
    "}"=>"{",
];

$check_arr=[
    '{}',
    '}{',
    '((({})))',
    '{()})',
    '{(){}()}',
];
foreach ($check_arr as $str){
    echo $str."        ".var_export(checkValid($str),1).PHP_EOL;
}

function checkValid($str){
    global $dict;
    $stack_arr=[];
    $len=strlen($str);

    for ($i=0;$i<$len;$i++){
        $s=$str[$i];
        if(in_array($s,array_values($dict))){
            array_push($stack_arr,$s);

        }elseif (in_array($s,array_keys($dict))){
            if(empty($stack_arr) || (array_pop($stack_arr)!=$dict[$s])){
                return false;
            }
        }
    }
    return empty($stack_arr);

}

```
### 时间复杂度和空间复杂度
每个元素进栈出栈为O(1),n个元素所以时间复杂度为O(1)xn=O(n)           
空间上最坏O(n)的复杂度




[code](https://github.com/hkui/algo_practice/blob/master/php/04_stack/checkValid.php)




