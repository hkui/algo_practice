<?php
/**
 * 二叉查找树的前中后序列遍历
 */

namespace Algo_09_tree;

require_once '../vendor/autoload.php';


$tree=new Tree(20);
$tree->insert(16);
$tree->insert(30);
$tree->insert(12);
$tree->insert(19);

$tree->insert(10);
$tree->insert(15);
$tree->insert(18);
$tree->insert(21);
$tree->insert(38);


//$tree->delete(20);
print_r($tree->root);

$tree->preOrder($tree->root);

echo PHP_EOL;
$tree->inOrder($tree->root);
echo PHP_EOL;
$tree->postOrder($tree->root);
echo PHP_EOL;


