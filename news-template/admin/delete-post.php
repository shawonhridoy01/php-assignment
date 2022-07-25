<?php 

// fetching old image from database 
require "../database/config.php";
if(isset($_GET["id"] )){
    $id = $_GET["id"];
}else{
    header("location:{$dir}/post.php");
}

if(isset($_GET["category"] )){
    $category_id = $_GET["category"];
    // echo $category_id;
}else{
    header("location:{$dir}/post.php");
}


$dataFetch = "SELECT * from post where post_id ='{$id}'";
$dataFetch_query = mysqli_query($conn, $dataFetch);
$oldImage = " ";
while ($row = mysqli_fetch_assoc($dataFetch_query)) {
     $oldImage = $row["post_img"];
     
}

$file = "./upload/".$oldImage;


$deleteQuery = "delete from post where post_id = {$id};";
$deleteQuery .= "update category set post = post - 1 where category_id = '{$category_id}'";


$deleteQueryResult = mysqli_multi_query($conn,$deleteQuery);

if($deleteQueryResult){
        unlink($file);
        $message = "data deleted successfully";
        header("location:{$dir}/post.php?msg={$message}");
    }

else{
    $message = "Data Delete Failed";
    header("location:{$dir}/post.php?msg={$message}");
}
