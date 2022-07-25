<?php
            
include "./config.php";
            
$first_name = $_POST["fname"];
$last_name = $_POST["lname"];
$subject = $_POST["subject"];

$insertQuery = "insert into students (first_name,last_name,subject) value ('{$first_name}','{$last_name}','{$subject}')";

$insertQueryResult = mysqli_query($conn,$insertQuery) or die("query failed");

if($insertQueryResult){
    echo 1;
}else{
    echo 0;
}