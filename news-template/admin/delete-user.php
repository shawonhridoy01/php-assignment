<?php

include "../database/config.php";

$id = $_GET["id"];

$delete = "delete from user where user_id = '{$id}'";
$deleteResult = mysqli_query($conn,$delete);
if($deleteResult){
    $message = "delete Successful";
    header("location:{$dir}/users.php?msg='$message' ");
}else{
    $message = "Delete Failed";
    header("location:{$dir}/users.php?msg='$message'  ");
}

