<?php
/**
 * Created by PhpStorm.
 * User: 764432054@qq.com
 * Date: 2020/4/7
 * Time: 20:08
 */
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return String[][]
     */
    function findLadders($beginWord, $endWord, $wordList) {
        if (empty($wordList) || !in_array($endWord, $wordList)) {
            return [];
        }
        $len = strlen($beginWord);

        $all_combo_dict = [];
        foreach ($wordList as $v) {
            for ($i = 0; $i < $len; $i++) {
                $key = substr_replace($v, '*', $i, 1);
                $all_combo_dict[$key][] = $v;
            }
        }

        //$queueExists=[];

        $step=[];
        $queue = [[$beginWord, 1,$step]];
//        $levelArr=[];
        $ret=[];
        while ($queue) {
            [$current, $level,$step] = array_shift($queue);
            //if(isset($queueExists[$current])) continue;
            if(in_array($current,$step)) continue;//该条路里是否出现过
            $step[]=$current;
//            $levelArr[$level][]=$step;


            //记录是否加入过队列
            //$queueExists[$current]=1;

            if ($current == $endWord) {
                if(empty($ret)){
                    $ret[]=$step;
                }else{
                    $stepCount=count($step);
                    foreach ($ret as $k=>$v){
                        $vCount=count($v);
                        if($vCount>$stepCount){
                            unset($ret[$k]);
                        }
                    }
                    if(count(current($ret))==$stepCount){
                        $ret[]=$step;
                    }

                }
                continue;
            }
            $currentPattern = $this->pattern($current);

            foreach ($currentPattern as $k) {
                if (isset($all_combo_dict[$k])) {
                    foreach ($all_combo_dict[$k] as $item){
                        array_push($queue, [$item, $level + 1,$step]);

                    }
                }
            }

        }

        return $ret;

    }
    function pattern($word)
    {
        $len = strlen($word);
        $pattern = [];
        for ($i = 0; $i < $len; $i++) {
            $pattern[] = substr_replace($word, "*", $i, 1);
        }
        return $pattern;
    }

    function findLadders1($beginWord, $endWord, $wordList) {
        $ans = $paths = [];
        $wordList = array_flip($wordList);
        $paths[] = [$beginWord];
        $level = 0;
        $min_level = pow(2, 31);
        $visited = [];
        while (!empty($paths)) {
            $path = array_shift($paths);
            if (count($path) > $level) {
                foreach ($visited as $w=>$i) unset($wordList[$w]);
                $visited = [];
                if (count($path) > $min_level) break;
                $level = count($path);
            }
            $last = end($path);
            for ($i = 0; $i < strlen($last); $i++) {
                $news = $last;
                for ($k = ord('a'); $k <= ord('z'); $k++) {
                    $news[$i] = chr($k);
                    if (isset($wordList[$news])) {
                        $newpath = $path;
                        $newpath[] = $news;
                        $visited[$news] = true;
                        if ($news == $endWord) {
                            $min_level = $level;
                            $ans[] = $newpath;
                        } else {
                            $paths[] = $newpath;
                        }
                    }
                }
            }
        }
        return $ans;
    }
}

$so = new Solution();

$tests = [
    ['hit', 'cog', ["hot", "dot", "dog", "lot", "log", "cog"]],
//    ['hit', 'cog',["hot","dot","dog","lot","log"]],
//    ["red","tax",["ted","tex","red","tax","tad","den","rex","pee"]],
//    ["hot", "dog",["hot", "dog"]],
//    ['hot','dog',["hot","cog","dog","tot","hog","hop","pot","dot"]]
//["cet", "ism", ["kid","tag","pup","ail","tun","woo","erg","luz","brr","gay","sip","kay","per","val","mes","ohs","now","boa","cet","pal","bar","die","war","hay","eco","pub","lob","rue","fry","lit","rex","jan","cot","bid","ali","pay","col","gum","ger","row","won","dan","rum","fad","tut","sag","yip","sui","ark","has","zip","fez","own","ump","dis","ads","max","jaw","out","btu","ana","gap","cry","led","abe","box","ore","pig","fie","toy","fat","cal","lie","noh","sew","ono","tam","flu","mgm","ply","awe","pry","tit","tie","yet","too","tax","jim","san","pan","map","ski","ova","wed","non","wac","nut","why","bye","lye","oct","old","fin","feb","chi","sap","owl","log","tod","dot","bow","fob","for","joe","ivy","fan","age","fax","hip","jib","mel","hus","sob","ifs","tab","ara","dab","jag","jar","arm","lot","tom","sax","tex","yum","pei","wen","wry","ire","irk","far","mew","wit","doe","gas","rte","ian","pot","ask","wag","hag","amy","nag","ron","soy","gin","don","tug","fay","vic","boo","nam","ave","buy","sop","but","orb","fen","paw","his","sub","bob","yea","oft","inn","rod","yam","pew","web","hod","hun","gyp","wei","wis","rob","gad","pie","mon","dog","bib","rub","ere","dig","era","cat","fox","bee","mod","day","apr","vie","nev","jam","pam","new","aye","ani","and","ibm","yap","can","pyx","tar","kin","fog","hum","pip","cup","dye","lyx","jog","nun","par","wan","fey","bus","oak","bad","ats","set","qom","vat","eat","pus","rev","axe","ion","six","ila","lao","mom","mas","pro","few","opt","poe","art","ash","oar","cap","lop","may","shy","rid","bat","sum","rim","fee","bmw","sky","maj","hue","thy","ava","rap","den","fla","auk","cox","ibo","hey","saw","vim","sec","ltd","you","its","tat","dew","eva","tog","ram","let","see","zit","maw","nix","ate","gig","rep","owe","ind","hog","eve","sam","zoo","any","dow","cod","bed","vet","ham","sis","hex","via","fir","nod","mao","aug","mum","hoe","bah","hal","keg","hew","zed","tow","gog","ass","dem","who","bet","gos","son","ear","spy","kit","boy","due","sen","oaf","mix","hep","fur","ada","bin","nil","mia","ewe","hit","fix","sad","rib","eye","hop","haw","wax","mid","tad","ken","wad","rye","pap","bog","gut","ito","woe","our","ado","sin","mad","ray","hon","roy","dip","hen","iva","lug","asp","hui","yak","bay","poi","yep","bun","try","lad","elm","nat","wyo","gym","dug","toe","dee","wig","sly","rip","geo","cog","pas","zen","odd","nan","lay","pod","fit","hem","joy","bum","rio","yon","dec","leg","put","sue","dim","pet","yaw","nub","bit","bur","sid","sun","oil","red","doc","moe","caw","eel","dix","cub","end","gem","off","yew","hug","pop","tub","sgt","lid","pun","ton","sol","din","yup","jab","pea","bug","gag","mil","jig","hub","low","did","tin","get","gte","sox","lei","mig","fig","lon","use","ban","flo","nov","jut","bag","mir","sty","lap","two","ins","con","ant","net","tux","ode","stu","mug","cad","nap","gun","fop","tot","sow","sal","sic","ted","wot","del","imp","cob","way","ann","tan","mci","job","wet","ism","err","him","all","pad","hah","hie","aim","ike","jed","ego","mac","baa","min","com","ill","was","cab","ago","ina","big","ilk","gal","tap","duh","ola","ran","lab","top","gob","hot","ora","tia","kip","han","met","hut","she","sac","fed","goo","tee","ell","not","act","gil","rut","ala","ape","rig","cid","god","duo","lin","aid","gel","awl","lag","elf","liz","ref","aha","fib","oho","tho","her","nor","ace","adz","fun","ned","coo","win","tao","coy","van","man","pit","guy","foe","hid","mai","sup","jay","hob","mow","jot","are","pol","arc","lax","aft","alb","len","air","pug","pox","vow","got","meg","zoe","amp","ale","bud","gee","pin","dun","pat","ten","mob"]],

];
foreach ($tests as $t){
    echo print_r($so->findLadders($t[0], $t[1], $t[2]),1).PHP_EOL;
}
