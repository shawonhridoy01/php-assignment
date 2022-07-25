<?php 
include "./config.php";
$msg = null;
if(isset($_POST["submit_image"])){

    if(isset($_FILES["image_name"])){
        $imageName = $_FILES["image_name"] ["name"];
        $imageTmp = $_FILES["image_name"] ["tmp_name"];
        $imageSize = $_FILES["image_name"] ["size"];
        $imageExArray = ["jpg","png","jpeg"];
        $imageEx = explode(".",$imageName);
        $imageExtension = strtolower(end($imageEx));
        $uniqueImageName = time().".".$imageName;
        
    
        if($imageSize > 2097152){
            $msg =  "Image should be more than 2 mb";
        }elseif(in_array($imageExtension,$imageExArray)){
            $image = move_uploaded_file($imageTmp,"./image/banner/".$uniqueImageName);
            
            $msg = "upload successful";
        }else{
            $msg = "Image should be jpg,png,jpeg";
        }
    }

    $insertQuery = "insert into imageupload (image_name) values ('{$uniqueImageName}')";
    $insertQueryResult = mysqli_query($conn,$insertQuery);
    if($insertQueryResult){
        echo "Query Successfull";
    }else{
        echo "query failed".mysqli_error($conn);
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div class="img-upload-div">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <label for="image_name">Upload Image</label>
            <br>
            <input type="file" name="image_name" id="image_name">
            <input type="submit" value="Upload Image" name="submit_image" class="submit">
            <p style="color:red"><?php  echo $msg; ?></p>

        </form>
    </div>

    <table>
    <?php

            
            $selectQuery = "select * from imageupload";
            $selectQueryResult = mysqli_query($conn,$selectQuery) or die("stop query");
            if(mysqli_num_rows($selectQueryResult) > 0){
                while($row = mysqli_fetch_assoc($selectQueryResult)){
        
    ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><img src="./image/banner/<?php echo $row['image_name'] ?>" alt=""></td>
        </tr>
        <?php             
                }
            }else{
                echo "data not found";
            }

             ?>
        

    </table>
</body>

</html>