<?php

include "config.php";
$id= mysqli_real_escape_string($conn,$_GET["id"]);
$n_deleteQuery = "DELETE FROM news WHERE id='$id'";
$n_DeleteResult = mysqli_query($conn,$n_deleteQuery);
if($n_DeleteResult){
    header("location:http://localhost/php/ssbProject/admin/news.php");

}else{
    header("location:http://localhost/php/ssbProject/admin/news.php");
    
}




?>