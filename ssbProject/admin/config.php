<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "mynews";

$conn = mysqli_connect($host,$username,$password,$database);

if($conn){
    echo "";
}else{
    echo die(mysqli_connect_error());
}




?>