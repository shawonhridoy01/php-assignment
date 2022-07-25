<?php 

require "../../database/config.php";
// post_id
// post_title
// postdesc
// category
// submit
// user update query =========================
// post_id 	title 	description 	category 	post_date 	author 	post_img 

if(isset($_POST['submit'])){

    $post_id = mysqli_real_escape_string($conn,$_POST["post_id"]);
    if(empty($_FILES["new-image"] ["name"])){
        $imageUniqueName = $_POST["old-image"];
    }else{
        // copy code 


    // fetching old image from database 
    $dataFetch = "SELECT * from post where post_id ='{$post_id}'";
    $dataFetch_query = mysqli_query($conn, $dataFetch);
    $oldImage = " ";
    while ($row = mysqli_fetch_assoc($dataFetch_query)) {
         $oldImage = $row["post_img"];
        //  echo $oldImage;
    }




    $upload_status= false;
    if(isset($_FILES["new-image"])){
        $image = $_FILES["new-image"];
        $imageName = $image["name"];
        $imageTmp_name = $image["tmp_name"];
        $imageSize = $image["size"];
        $imageExtensionArray =["jpg","png","jpeg"];
        $imageEx = explode(".",$imageName);
        $imageExactExtension = strtolower(end($imageEx));
        $imageUniqueName = time().".".$imageName;
        
        $file = "../upload/".$oldImage;
    

        if($imageUniqueName != $oldImage){
            if(file_exists($file)){
                unlink($file);
            
        }
            if($imageSize > 2097152){
                $message = "Image should not be more than 2 mb";
            }elseif(in_array($imageExactExtension,$imageExtensionArray)){
                move_uploaded_file($imageTmp_name,"../upload/".$imageUniqueName);
                $upload_status = true;
            }else{
                $message = "Image not found";
            
            }
                
            }
    
        }
    
        // copy code 
    }

    $post_title = mysqli_real_escape_string($conn,$_POST["post_title"]);
    $postdesc = mysqli_real_escape_string($conn,$_POST["postdesc"]);
    $category = mysqli_real_escape_string($conn,$_POST["category"]);



    if(empty($post_title) || empty($postdesc)){
        // $message = "All Field is required";
        echo  "All Field is required";
    }
    // elseif(strlen($post_title) <! 20 || strlen($post_title) < 49){
    //     // $message = "Post Title Should be 20 to 49 character";
    //     echo "Post Title Should be 20 to 49 character";
    // }
    // elseif(strlen($postdesc) < 30 && strlen($postdesc) < 600){
    //     // $message = "Last Name Should be 30 to 600 character";
    //     echo "Description Should be 30 to 600 character";
    // }
    else{
    
            $update = "UPDATE post SET title='{$post_title}',description='{$postdesc}',category='{$category}',post_img = '{$imageUniqueName}' WHERE post_id = {$post_id}";
            $updateResult = mysqli_query($conn,$update) or die( "query failed");    
    }

    if($updateResult){
        $message = "data has been updated successfully";
        header("location:{$dir}/post.php?msg='$message' ");
        // echo "success";
    }else{
        
        // $message = "update failed"."<br>";
        // echo  "update failed"."<br>";
        // header("location:{$dir}/post.php?msg='$message' ");

    }

}




?>