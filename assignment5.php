<?php

// Question 01: 

// 	We have an array [12,34,2,6,78]. What kind of array is this? Find all prime numbers from this array.

// Step 1: First let us find the factors of the given number( factors are the number that completely divides the given number)

// Step 2: Then check the total number of factors of that number

// Step 3: Hence, If the total number of factors is more than two, it is not a prime number but a composite number. Because When a number is divisible by only one and itself, then it is a prime number.

$numbers = array(12,34,2,6,78,2,25,11);
echo "<h1> Problem 1: </h1>";
foreach($numbers as $number){
    $is_prime = true;
    for($i=2;$i<$number; $i++){
        if($number % $i == 0){
            $is_prime = false;
        }
    }
    if($is_prime){
        echo $number." is a prime number";
        echo "<br>";
    }else{
        echo $number." is a not prime number";
        echo "<br>";
    }
    
}

// echo "this array is index array";

// Question 02: 

// 	Let’s think about a use case, Daraz admin’s have some products for uploads on their e-commerce site. So make an array of products which contains 5 products.

// Go to daraz website and pick any 5 products and make your array.

// Must mention Which type of array you have made.
echo "<h1> Problem 2: </h1>";
$electronic_products = ["mobile","laptop","watch","calculator","desktop"];
echo "this is an index array";


// Question 03: 

// 		This is an array array(0,10,80,67,60,89,91,56,45,30,95,83,99) 

// Find the maximum value from this array.

// Must use a foreach loop.

echo "<h1> Problem 3: </h1>";
$myNumbers = array(0,10,80,67,60,89,91,56,45,30,95,83,99);
$maxNumber = 1;
foreach($myNumbers as $num){
    if($num <  $maxNumber){
        $maxNumber = $num;
    }
    
}
echo "Max number is : ".$num;
echo "<br>";


// Question 04: 

// Let’s traverse this array(0,10,80,67,60,89,91,56,45,30,95,83,99) and print 0 index then skip 1 index again print 2 skip 3….
echo "<h1> Problem 4: </h1>";
$traverseableNumber  = array(0,10,80,67,60,89,91,56,45,30,95,83,99);

foreach($traverseableNumber as $key => $singleTraverse){
    if($key % 2== 0){
        echo "$singleTraverse"."<br>";
    }
}


?>