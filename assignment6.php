<?php

// Question 01:

// 		You have purchased some items from a supershop. Purchase product array is given below-

// 	$purchased_products = array(

//         		array('name' => 'banana',  'qty' => 10, 'total_price' => 550),

//         		array('name' => 'apple',     'qty' => 50,  'total_price' => 1500),

//         		array('name' => 'orange',  'qty' => 7,    'total_price' => 600),

//     	);

// How much product quantity you have purchased (total purchased qty = 67)

// Calculate the total amount of all purchased items (total amount = 2650 tk).
echo "<h1> Problem 1</h1>";
	$purchased_products = array(

        		array('name' => 'banana',  'qty' => 10, 'total_price' => 550),

        		array('name' => 'apple',     'qty' => 50,  'total_price' => 1500),

        		array('name' => 'orange',  'qty' => 7,    'total_price' => 600),

    	);

	// counting total product

    $total_product = 0;
    
    foreach($purchased_products as $singleArray){
        foreach($singleArray as $key =>  $singleProduct){
			if($key == "qty"){
				$total_product+=$singleProduct;
			}
			
		}
		
    }
	echo "Total Purchased Quantity " . $total_product."<br>";
	


	// counting total price 
	$total_prices = 0; 
	foreach($purchased_products as $singlePrice){
		foreach($singlePrice as $key => $price){
			if($key == "total_price"){
				$total_prices += $price;
			}
		}
	}
	echo "total amount " .$total_prices." ";



// 	Question 02: 

// 		You have two array of emails, these are given below-

// 	$first_email_array = ["abc@gmail.com", "xyz@gmail.com", "demo@gmail.com"]; 

// $second_email_array = ["efg@gmail.com", "xyz@gmail.com", "dummy@gmail.com"];

// You have to make a single array from this two arrays

// And don’t keep any value in multiple time
echo "<h1> Problem 2</h1>";
$first_email_array = ["abc@gmail.com", "xyz@gmail.com", "demo@gmail.com"]; 

$second_email_array = ["efg@gmail.com", "xyz@gmail.com", "dummy@gmail.com"];

$merge_array = array_merge($first_email_array,$second_email_array);
$third_email_array = array_unique($merge_array);

echo "<pre>";
print_r($third_email_array);
echo "</pre>";



// Question 03:

// 	$citylist = array( "Black Canyon City", "Chandler", "Flagstaff", "Gilbert", "Glendale", "Globe", "Mesa", "Miami", "Phoenix", "Peoria", "Prescott", "Scottsdale", "Sun City", "Surprise", "Tempe", "Tucson", "Wickenburg" );

// Split this given array into chunks 4

echo "<h1> Problem 2</h1>";
$citylist = array( "Black Canyon City", "Chandler", "Flagstaff", "Gilbert", "Glendale", "Globe", "Mesa", "Miami", "Phoenix", "Peoria", "Prescott", "Scottsdale", "Sun City", "Surprise", "Tempe", "Tucson", "Wickenburg" );


$chunkArray = array_chunk($citylist,5);

echo "<pre>";
print_r($chunkArray);
echo "</pre>";




?>