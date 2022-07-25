<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($host,$username,$password,$database);

if($conn){
    echo "connection successfull";
}else{
    die("connection failed" . mysqli_connect_error());
}


?>