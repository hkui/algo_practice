<?php
/**
 * Date: 2020/1/18
 * Time: 22:00
 */

/**
 * Class Solution
 * 寻找最近的回文数
 */
class Solution {

    /**
     * @param String $n
     * @return String
     */
    function nearestPalindromic($n) {
        $len=strlen($n);
        if($n<=9){
            return strval($n-1);
        }
        $i=0;
        $j=$len-1;
        $huiwen=$n;
        while($i<$j){
            $huiwen[$j]=$huiwen{$i};
            $i++;
            $j--;
        }
        //回文后等于自身的  11,121,  1221
        if($huiwen==$n){
            //找1个大于的和一个小于的
            //找1个小于的,$midIndex位置减1，如果mindUndex=0 返回9
            $smaller=$this->getSmaller($huiwen,$len);
            $larger=$this->getlarger($huiwen,$len);
            $leftDiff=$huiwen-$smaller;
            $rightDiff=$larger-$huiwen;
            if($leftDiff<=$rightDiff){
                return strval($smaller);
            }
            return strval($larger);

        //980 ->989,979     ;230 ->232  ,222
        }elseif ($huiwen>$n){
            $smaller=$this->getSmaller($huiwen,$len);
            if($n-$smaller<=$huiwen-$n){
                return strval($smaller);
            }
            return strval($huiwen);


        }else{
            //123->121,131
            $larger=$this->getlarger($huiwen,$len);
            if($n-$huiwen<=$larger-$n){
                return strval($huiwen);
            }
            return strval($larger);
        }

    }
    public function getSmaller($huiwen,$len){
        $midIndex=$len%2==0?$len/2-1:intval($len/2);
        $smaller='';
        $i=$midIndex;
        while ($i>=0){
            if($huiwen{$i}>=1 ){
                break;
            }else{
                $i--;
            }
        }

        //100 需要降低1个数量级了
        //最多可能为0
        if($i<0 ||($i==0 && $huiwen{0}==1)){
            $len=$len-1;
            for($i=0;$i<$len;$i++){
                $smaller{$i}='9';
            }

        }else{
            $j=0;
            while($j<$len){
                if($j==$i){
                    $smaller{$j}=intval($huiwen{$j})-1;
                }else{
                    if(isset($smaller{($len-$j-1)})){
                        $smaller{$j}=$smaller{($len-$j-1)};
                    }else{
                        $smaller{$j}=$huiwen{$j};
                    }
                }
                $j++;
            }
        }
        return $smaller;


    }
    public function getlarger($huiwen,$len){
        $midIndex=$len%2==0?$len/2-1:intval($len/2);
        $larger='';
        $i=$midIndex;
        //找不为9 的
        while($i>=0){
            if($huiwen{$i}!=9){
                break;
            }else{
                $i--;
            }
        }
        //比如992 到1001  92 到101
        if($i<0){

            $larger{0}='1';
            $len=$len+1;
            $larger{($len-1)}=1;
            $i=1;
            while($i<$len-1){
                $larger{$i}=0;
                $i++;
            }

        }else{
            //190 ,180
            $j=0;
            while($j<$len){
                if($j==$i){
                    $larger{$j}=$huiwen{$j}+1;
                }else{
                    if(isset($larger{($len-$j-1)})){
                        $larger{$j}=$larger{($len-$j-1)};
                    }else{
                        $larger{$j}=$huiwen{$j};
                    }
                }
                $j++;
            }
        }
        return $larger;

    }
}

$so=new Solution();



$tests=[
//    '1',
    '88'
//    '100',
//    '121',
//    '123',
//    '980',
//    '990',
//    '999',
//    '891'

];
foreach ($tests as $n){
    echo $n.'===>'.$so->nearestPalindromic($n).PHP_EOL;
}

