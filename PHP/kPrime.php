<?php 

/*
A natural number is called k-prime if it has exactly k prime factors, counted with multiplicity. A natural number is thus prime if and only if it is 1-prime.

Examples:
k = 2 -> 4, 6, 9, 10, 14, 15, 21, 22, …
k = 3 -> 8, 12, 18, 20, 27, 28, 30, …
k = 5 -> 32, 48, 72, 80, 108, 112, …

Task:

Given an integer k and a list arr of positive integers the function consec_kprimes (or its variants in other languages) returns how many times in the sequence arr numbers come up twice in a row with exactly k prime factors?
Examples:

arr = [10005, 10030, 10026, 10008, 10016, 10028, 10004]
consec_kprimes(4, arr) => 3 because 10005 and 10030 are consecutive 4-primes, 10030 and 10026 too as well as 10028 and 10004 but 10008 and 10016 are 6-primes.

consec_kprimes(4, [10175, 10185, 10180, 10197]) => 3 because 10175-10185 and 10185- 10180 and 1
*/

function isPrime($number) {
    // A prime number is greater than 1
    if ($number <= 1) {
        return false;
    }

    // Check divisibility from 2 to the square root of the number
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false; // Not a prime number
        }
    }

    return true; // Prime number
}

//echo  isPrime(3)?"prime":"not prime";

function isKPrimies($k, $num){
    $copy_num=$num;


    for($i=2; $i<=(int)($num/2); $i++){
    
       
        if(isPrime($i)) {
           
            while($copy_num % $i ==0){
                 echo $i."\n";
                $copy_num = $copy_num/$i;
                $k=$k-1;
                echo "K=>".$k."\n";
              
            }
    
        }
    }
 
  
    return $k==0;
}

//echo isKPrimies(4, 10016  )?"yes":"no";

function consecKprimes($k, $arr)
{
    // your code
 $cnt=0;
  for($i=0; $i<count($arr)-1; $i++){
      
      //echo $arr[$i];
      if(isKPrimies($k,$arr[$i]) && isKPrimies($k, $arr[$i+1]) ){
           $cnt++;
      }
  }
  
  return  $cnt;
}
