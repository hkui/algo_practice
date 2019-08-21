## 一次遍历删除倒数第n个节点
* 如果知道链表的长度len,那么从头遍历 只需要走```(len-n)```个即可，关键是现在不知道
* 如果现在有一个指针p1让它先走n,那么p1走完还需要```(len-n)```，和上面的```(len-n)```好熟悉
* 那么再用一个指针p2从头开始和p1一起走，等p1走到链表结尾，那么p2正好走了```(len-n)```，完美！
* 此时p2的位置就是倒数第n+1个节点位置

[delReciprocalN.c](https://github.com/hkui/algo_practice/blob/master/c/04_linklist/delReciprocalN.c)



