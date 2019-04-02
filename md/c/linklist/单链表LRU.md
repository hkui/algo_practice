* 单链表实现lru     
越靠近链表尾部的节点是越早之前访问的        
当有一个新的数据被访问时，从链表头开始顺序遍历链表
    * 1.如果此数据之前已经被缓存在链表中
        * 遍历得到这个数据对应的节点，并将其从原来的位置删除，然后再插入到链表的头部
    * 2.没在缓存链表里
        * 2.1 缓存未满，将次节点直接插入到链表的头部
        * 2.2 已经满了，删除链表尾部节点，将新的数据节点插入到链表的头部

single_list_lru.c
![](https://note.youdao.com/yws/api/personal/file/20C6E684C8E843CA9F3C33EB00A4F49F?method=download&shareKey=0859508c70eba48e40fc3adfe85cb51e)
