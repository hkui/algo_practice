<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/1/6
 * Time: 22:17
 */

/**
 * Class ListNode
 * 单链表
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}
class DoubleLinkList{
    public $key;
    public $val;
    public $prev;/*@var DoubleLinkList $prev */
    public $next;/*@var DoubleLinkList $next */

    public function __construct($key,$val)
    {
        $this->key=$key;
        $this->val=$val;
    }
}

function createNodeList($arr)
{
    $head = new ListNode(null);

    $cur = $head;
    foreach ($arr as $v) {
        $node = new ListNode($v);
        $cur->next = $node;
        $cur = $cur->next;


    }
    return $head->next;
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}

function nodesShow($node)
{
    $str = '';
    while ($node) {
        $str .= $node->val . '=>';
        $node = $node->next;
    }
    return trim($str, '=>');
}

/**
 * @param $arr
 * 根据数组创建对应的树，省得每次测试时得费力创建
 */
function createTreesByArr($arr)
{
    if (empty($arr)) {
        return null;
    }
    $root = new TreeNode(array_shift($arr));
    $treeArr = [$root];

    while ($treeArr) {
        $nowNode = array_shift($treeArr);
        if (!isset($nowNode->left) && !empty($arr)) {
            $v = array_shift($arr);

            if (!is_null($v)) {
                $node = new TreeNode($v);
                $nowNode->left = $node;
                array_push($treeArr, $node);
            }
        }
        if (!isset($nowNode->right) && !empty($arr)) {
            $v = array_shift($arr);
            if (!is_null($v)) {
                $node = new TreeNode($v);
                $nowNode->right = $node;
                array_push($treeArr, $node);
            }

        }
    }
    return $root;
}
