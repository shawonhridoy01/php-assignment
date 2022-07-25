<?php
include "config.php";

$id= mysqli_real_escape_string($conn,$_GET["id"]);
$deleteQuery = "delete from category where id='$id'";
$resultDeleteQuery = mysqli_query($conn,$deleteQuery);
if($resultDeleteQuery){
    header("location:http://localhost/php/ssbProject/admin/category.php");
}else{
    header("location:http://localhost/php/ssbProject/admin/category.php");
}



?>