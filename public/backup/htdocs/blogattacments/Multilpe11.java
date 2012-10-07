import java.io.*;
import java.lang.*;

public class Multilpe11 {
    
    /*
     * Some multiples of 11 have an even digit sum.  
     * For example, 7*11 = 77 and 7+7 = 14, which is even; 11*11 = 121 and 1+2+1 = 4, which is even.  
     * Do all multiples of 11 have an even digit sum?  
     * (Prove that they do or find the smallest that does not.)
     */
    
    public static void main(String[] args) { 
        String b = "";   //string value of 'a' (a multiple of 11)
        int length = 1;  //number of digits in the number 'a'
        int[] array= new int[999];;     //for storing the numbers for which the statement does not hold
        int sum=0;       //the sum of the digits in the number 'a'
        int many = 0;    //for how many numbers, doesnt the statement hold. 
        int r = 0;       //index to store the number for which the statement doesnt hold in array 'array'
        
        System.out.println("Some multiples of 11 have an even digit sum.  For example, 7*11 = 77 and 7+7 = 14, which is even; 11*11 = 121 and 1+2+1 = 4, which is even.  Do all multiples of 11 have an even digit sum?  (Prove that they do or find the smallest that does not.)");
        
        System.out.print("For how many consecutive multiples of 11 would you like to check if the statement is correct: ");
        
        int n = BranjePodatkov.preberiInt();  //reads value from keyboard.
        //System.out.println("These are the multiples of 11, whose sum of digits is not even:");
        for(int a=0; a<n; a+=11){
            b = Integer.toString(a);   
            length = b.length();     //number of digits in 'a'
            sum = 0;  //resets digit sum
            
            int i=0;
            while(i<length){
                //Convestr char to int:
                char temp = b.charAt(i);
                String p = String.valueOf(temp);
                int num = Integer.parseInt(String.valueOf(p));
                
                sum += num; //sum of digits
                
                ++i;
            }
            
            //stores the number for which the statement doesnt hold in an array:
            if((sum%2!=0)){
                many++;
                //System.out.println("Is " + a+ " divisible by 11? " + (a%11==0) +". Is even? "+(sum%2==0));
                array[r] = a;   
                ++r;
            }

        }
        
        //outputs how many such numbers are there, and which ones they are:
        System.out.println("These are " + many + " numbers smaller than "+ n +", that are multiples of 11, but whose digit sum is not even.");
        if(many!=0){
            System.out.println("These numbers are:");
            for(int k=0; k<many; k++){
                System.out.print(array[k]+ " ");
            }
        }
    }
    
}
