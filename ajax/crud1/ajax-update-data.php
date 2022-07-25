<?php

include "./config.php";
$id = $_POST["id"];
$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$subject = $_POST["subject"];

$updateQuery = "update students set  first_name = '{$firstName}', last_name = '{$lastName}', subject = '{$subject}' where id = '{$id}'";
$updateQueryResult = mysqli_query($conn,$updateQuery);

if($updateQueryResult){
    echo 1;
}else{
    echo 0;
}



?>