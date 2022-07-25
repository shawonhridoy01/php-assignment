<?php 

include "./config.php";

$id = $_POST["id"];

$deleteQuery = "DELETE FROM students WHERE id = '{$id}'";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);

if($deleteQueryResult){
    echo 1;
}else{
    echo 0;
}


?>