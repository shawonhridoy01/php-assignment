<?php

$conn = mysqli_connect("localhost","root","","load_data") or die("Connect Failed");


$first_name = $_POST["fname"];
$last_name = $_POST["lname"];
$insertQuery = "INSERT INTO studenttable(first_name, last_name) VALUES ('{$first_name}','{$last_name}')";
$insertQueryResult = mysqli_query($conn,$insertQuery) ;
if($insertQuery){
    echo 1;
}else{
    echo 0;
}
?>