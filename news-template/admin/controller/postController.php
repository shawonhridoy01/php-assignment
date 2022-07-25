<?php 
session_start();
require "../../database/config.php";

// add query ===============================


if(isset($_POST["submit"])){

    // image upload code 
    if(isset($_FILES["fileToUpload"])){
    $file_name = $_FILES["fileToUpload"] ["name"];
    $file_type =  $_FILES["fileToUpload"] ["type"];
    $file_tmp_name =  $_FILES["fileToUpload"] ["tmp_name"];
    $file_error= array();
    $file_size =  $_FILES["fileToUpload"] ["size"];

    $file_extension = explode(".", $file_name,2);
    $file_ex = end($file_extension);
    $exactExtension = strtolower($file_ex);
    $supportedExtension = ["jpg","png","jpeg"];
    $fileUniqueName = time().$file_name;

    if($file_size > 2097152){
        // $file_error[] = "File Can't be more than 2 MB";
        echo  "File Can't be more than 2 MB";
    }elseif(!in_array($exactExtension,$supportedExtension)){
        // $file_error[] = $file_extension."is not supported please enter jpg,png,jpeg file";
        echo  $file_extension."is not supported please enter jpg,png,jpeg file";
    }else{
        move_uploaded_file($file_tmp_name,"../upload/".$fileUniqueName);
    }   


    }
        // image upload code end
    
    // fetching data from form value 
    $post_title = mysqli_real_escape_string($conn,$_POST["post_title"]);
    $postdesc = mysqli_real_escape_string($conn,$_POST["postdesc"]);
    $category = mysqli_real_escape_string($conn,$_POST["category"]);
    $date = date("d M Y");
    // $author =  $_SESSION["user_id"] ;






    // checking query username already exisits or not 
    // $usernameChecker = "select * from user where username = '{$username}'";
    // $usernameCheckerResult = mysqli_query($conn,$usernameChecker);

    if(empty($post_title) || empty($postdesc) || empty($category) || empty("fileToUpload")){
        // $message = "All Field is required";
        echo "All Field is required";
    }elseif(strlen($post_title) < 10 || strlen($post_title) > 50){
        echo "Post Title Should be 11 to 49 character";
        
    }elseif(strlen($postdesc) < 20 || strlen($post_title) > 600){
        // $message = "Post Description Should be 20 to 599 character";
        echo  "Post Description Should be 20 to 599 character";

    }else{

        $insertQuery = "insert into post (title,description,category,post_date,post_img) values ('{$post_title}','{$postdesc}','{$category}','{$date}','{$fileUniqueName}');";
        // ,'{$author}' author
        $insertQuery .= "update category set post = post + 1 where category_id = '{$category}' ";

        $insertQueryResult = mysqli_multi_query($conn,$insertQuery);
        if($insertQueryResult){
            // $message = "Data Insert Successully";
            echo "success";
            // header("location:{$dir}/users.php?msg={$message}");
        
        }else{
            $message = "insertion failed";
            echo "insertion failed";
            // header("location:{$dir}/users.php?msg={$message}");
        }

    }



}


?>                  