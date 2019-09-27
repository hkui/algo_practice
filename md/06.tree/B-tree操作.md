### B-tree的操作
#### 1.B-tree的查找
B树是多路查找树，二叉排序树是二路查找,B树是多路查找,所以它是二叉排序树的拓展        
因此,B树的查找操作和二叉排序树的查找过程非常类似

* 查找过程:
    * 1.先让待查找关键字Key和节点中的关键字比较,如果等于其中某个关键字则查找成功。
    * 2. 如果和所有的关键字都不等，则看key处在哪个范围内，然后去对应的指针所指向的子树中查找
        * eg: 如果key比第一个关键字k<sub>1</sub>还小，则去P<sub>0</sub>指针所指向的子树中去查找         
        * 如果比最后一个关键字k<sub>n</sub>还大,则去P<sub>n</sub>指针所指向的子树中去查找

![](https://note.youdao.com/yws/api/personal/file/71C7C2802EA84DBF8B51A35C9392E7C8?method=download&shareKey=68e85220df9a05ebe71931d48e5d3bd0)

key=5,14,11,25
#### 2.B-tree的插入
在二叉排序树中，仅需查找到需要插入的终端结点的位置。        
但是在B-tree中找到插入位置后，并不能简单地将其添加到终端结点位置，因为此时可能会导致整棵树不再满足B-tree中定义的要求

给定一组关键字[20,30,50,52,60,68,70]给出创建1棵3阶B-tree的过程
##### 要满足的性质
> 根节点除外，非叶子节点至少有[3/2]-1=1个关键字,最多有m-1=2个关键字

* 1.m=3，所以一次插入20，30到节点

![](https://note.youdao.com/yws/api/personal/file/8ADB38C2DE1948C78F3DF3349396E7C2?method=download&shareKey=107436e07727bc7fa21fcdaef8d89531)

* 2.插入50，如下图，但是由于最多有2个关键字，所以这个节点不满足B-tree要求，需要分裂

![](https://note.youdao.com/yws/api/personal/file/64F2D548CEF3474D85EF33EF81064EA9?method=download&shareKey=9162f6835594558e1735e4eab4d52491)

##### 分裂的方法:取这个关键字数组中的中间关键字(n/2)向上取整 作为新的节点，然后其它关键字形成2个节点作为新节点的左右孩子

![](https://note.youdao.com/yws/api/personal/file/8776A5A0F98A4971A47D09B938E016D9?method=download&shareKey=5ef0a73e27e862103924f865f5f8a966)

* 3.插入52

![](https://note.youdao.com/yws/api/personal/file/0098A67E5FAC44DA91B2701CF4DFADD9?method=download&shareKey=eb2acef920cb7e6fe9ef3d22d5e0d6b4)

* 4.插入60,插入60后 又不符合b-tree性质(非叶节点数大于等于1小于等于2)，需要分裂

![](https://note.youdao.com/yws/api/personal/file/829F74AA633348A3B5B178390918AE60?method=download&shareKey=3b536d3aac110e4e3ff647eba2b536c8)

分裂方法：取中间节点3/2=2 即52，由于父结点只包含1个节点，可以把52和父级节点合并，之后处理中间节点的左右节点，由于 30<50<52,60>52,所以52,60各自作为1个单独节点

![](https://note.youdao.com/yws/api/personal/file/32144F5DBC364B648C01279C629D7B78?method=download&shareKey=8053df32c0c31032a263492a003f014a)

* 5.插入68

![](https://note.youdao.com/yws/api/personal/file/B1DFB311CE5A4AE0858E00258DB0BEDB?method=download&shareKey=87a6de3798ab464fce8ebe11b19a3c34)

* 6.插入70,插入后该节点关键字不符合要求 需要分裂

![](https://note.youdao.com/yws/api/personal/file/B84900A8C3CB4AB0ACA2773798F9B21F?method=download&shareKey=87e7dad653f3c77122864bed4e15dfe1)

分裂当前节点后

![](https://note.youdao.com/yws/api/personal/file/9E007D098BFF42AC8F8DBD92D1179C68?method=download&shareKey=6626e9918c26b612d8d11e79e804c6ec)

发现根节点不符合了
* 7.分裂根节点 取中间关键字 ceil(3/2)=2 即52作为新的节点的根节点的关键字

![](https://note.youdao.com/yws/api/personal/file/572465BCD31B4917B027913098B0A883?method=download&shareKey=cd2885ea972c61c593944f15f05347cb)

### B-tree的删除
B-tree中的删除操作与插入类似，但稍微复杂，要使得删除后的节点中的关键字个数>=ceil(m/2)-1,因此        
将涉及节点的"合并" 问题

#### 根据删除的关键字位置的不同，可分为关键字在终端节点和不在终端节点上2种情况
> 终端节点就是最底层的叶子节点的上面一层节点，也是最底层的存储有效关键字的节点
#### 1.要删除的关键字在终端节点(最底层非叶子节点)
* 1.节点内关键字数量大于ceil(m/2)-1,这时删除这个关键字不会破坏B-tree的定义，所以直接删除即可
* 2.节点内的关键字数量等于ceil(m/2)-1,并且其左右兄弟节点中**存在**关键字数量大于ceil(m/2)-1的节点，则去兄弟节点中借关键字
* 3.节点内的关键字数量等于ceil(m/2)-1,并且其左右兄弟节点中**不存在**关键字数量大于ceil(m/2)-1的节点，则需要进行**节点合并**

3阶B-tree

![](https://note.youdao.com/yws/api/personal/file/748DAA9A3A9A4C7CA5A89CA0229118E8?method=download&shareKey=0fc8b6ba371d89c4506b0e1a4e7e5b72)

```
m=3
ceil(m/2)-1=1

7，9所在的节点关键字个数大于1，所以删除该节点上7或者9，直接删除即可，符合第一种情况

删除2，2所在节点关键字为1,等于ceil(m/2)-1 ,所以得看兄弟节点里的情况
 发现存在关键字个数大于ceil(m/2)-1的兄弟节点
 如何借，把7，9里较小的关键字7作为新的双亲节点的关键字，5替换到待删除的2上
 删除2后的B-tree为下图
```
![](https://note.youdao.com/yws/api/personal/file/6E7109AA483C47C19D487DFE831BE5BB?method=download&shareKey=4e43ef89ea4a190980af90907db15842)

```
删除16，左右兄弟节点只有1个关键字，没法借了 属于第三种情况
所以要进行合并
从上一层取关键字和下一层合并
 方式1 :把14拿下来和11合并
 方式2：20拿下来和22合并
```

方式1结果

![](https://note.youdao.com/yws/api/personal/file/51CF6694B4044C8399FCC8289E224F7F?method=download&shareKey=3b2efa20956e11b9dc3a8fd68d19b7dd)

方式2 结果

![](https://note.youdao.com/yws/api/personal/file/474EFCF0ABD244F58601DF05D18F41A3?method=download&shareKey=bcd827a92d3d9978c4674213f76798c1)

#### 2.要删除的关键字不在终端节点上:需要先转换成在终端节点上，再按照终端节点上的情况分别考虑对应的方法
##### 相邻关键字:对于不在终端节点上的关键字，它的相邻关键字是其左子树中最大的关键字或者右子树中最小的关键字
* 情况1：存在关键字数量大于ceil(m/2)-1节点的左子树或者右子树，在对应的字数上找到该关键字的相邻关键字，然后将相邻关键字替换待删除的关键字
* 情况2:左右子树的关键字数量均等于 ceil(m/2)-1，则将这2个子树节点合并，然后删除待删除关键字

![](https://note.youdao.com/yws/api/personal/file/748DAA9A3A9A4C7CA5A89CA0229118E8?method=download&shareKey=0fc8b6ba371d89c4506b0e1a4e7e5b72)

```
要删除10
step1:找到相邻关键字为9或者11，其实就是这个大小序列中该关键字的直接前驱或者直接后继关键字

step2:将这个待删除的关键字和某个相邻关键字互换

```
![](https://note.youdao.com/yws/api/personal/file/5189F1E7A29B4A118FD47717FC4C3FBD?method=download&shareKey=78e59c7982300525ac9eba460e53d89f)

然后删除按照删除10 就行
```
情况2：
删除14 ，将，11，16合并，再删除

```

![](https://note.youdao.com/yws/api/personal/file/F94D9440E985402D9BC259431340791E?method=download&shareKey=a0a678984adf6128a46a5dd5443e07ca)

















