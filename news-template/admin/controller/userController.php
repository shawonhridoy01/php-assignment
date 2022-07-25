<?php 

require "../../database/config.php";

// add query ===============================

if(isset($_POST["save"])){

    // fetching data from form value 
    $first_name = mysqli_real_escape_string($conn,$_POST["fname"]);
    $last_name = mysqli_real_escape_string($conn,$_POST["lname"]);
    $username = mysqli_real_escape_string($conn,$_POST["user"]);
    $password =$_POST["password"] ;

    // password encrypt 
    $spassword = password_hash($password,PASSWORD_DEFAULT);
    $role = mysqli_real_escape_string($conn,$_POST["role"]);



    // checking query username already exisits or not 
    $usernameChecker = "select * from user where username = '{$username}'";
    $usernameCheckerResult = mysqli_query($conn,$usernameChecker);

    if(mysqli_num_rows($usernameCheckerResult) > 0){
        $message = $username."Already Exists";
        // echo  $username." Already Exists";
    }elseif(empty($first_name) || empty($last_name) || empty($username) || empty($password)){
        $message = "All Field is required";
        // echo "All Field is required";
    }elseif(strlen($first_name) < 3 && strlen($first_name) < 10){
        $message = "First Name Should be more 3 character";
        // echo "First Name Should be more 3 character";
    }elseif(strlen($last_name) > 10 && strlen($last_name) < 3){
        $message = "Last Name Should be more 3 character";
        // echo "Last Name Should be more 3 character";
    }elseif(strlen($username) > 10 && strlen($username) < 3){
        $message = "username Should be more 3 character";
        // echo "username Should be more 3 character";
    }else{

        $insertQuery = "insert into user (first_name,last_name,username,password,role) values ('{$first_name}','{$last_name}','{$username}','{$spassword}','{$role}')";
        $insertQueryResult = mysqli_query($conn,$insertQuery);
        if($insertQueryResult){
            $message = "Data Insert Successully";
            header("location:{$dir}/users.php?msg={$message}");
        
        }else{
            $message = "insertion failed";
            header("location:{$dir}/users.php?msg={$message}");
        }

    }



}

// user update query =========================
// user_id
// f_name
// l_name
// username

if(isset($_POST['submit'])){
    $user_id = mysqli_real_escape_string($conn,$_POST["user_id"]);
    $first_name = mysqli_real_escape_string($conn,$_POST["f_name"]);
    $last_name = mysqli_real_escape_string($conn,$_POST["l_name"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $role = mysqli_real_escape_string($conn,$_POST["role"]);


    if(empty($first_name) || empty($last_name) || empty($username)){
        $message = "All Field is required";
    }elseif(strlen($first_name) > 10 && strlen($first_name) < 3){
        $message = "First Name Should be more 3 character";
    }elseif(strlen($last_name) > 10 && strlen($last_name) < 3){
        $message = "Last Name Should be more 3 character";
    }elseif(strlen($username) > 10 && strlen($username) < 3){
        $message = "username Should be more 3 character";
    }else{
        $update = "UPDATE user SET first_name='{$first_name}',last_name='{$last_name}',username='{$username}', role='{$role}' WHERE user_id = '{$user_id}'";
        $updateResult = mysqli_query($conn,$update) or die( "query failed");

        if($updateResult){
        
            header("location:{$dir}/users.php?msg='$message' ");
        
        }else{
            $message = "update failed"."<br>";
            header("location:{$dir}/users.php?msg='$message' ");
    
        }
    }
}



?>                  