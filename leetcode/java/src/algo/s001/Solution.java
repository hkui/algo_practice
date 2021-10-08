package algo.s001;

import java.util.*;

class Solution {


    public static void main(String[] args) {
//       int []nums=new int[]{2,7,11,15};
//       int target=9;

        int []nums=new int[]{3,3};
        int target=6;
        int []ret=twoSum(nums,target);
        System.out.println(Arrays.toString(ret));

    }
    public static int[] twoSum(int[] nums, int target) {
        Hashtable<Integer,Integer> tb=new Hashtable<>();
        int[]ret=new int[2];
        int len=nums.length;
        for(int k=0;k<len;k++){
            int v=nums[k];
            if(tb.containsKey(v)){
                ret[0]=tb.get(v);
                ret[1]=k;
                return ret;
            }
            tb.put(target-v,k);
        }
        return ret;
    }
}