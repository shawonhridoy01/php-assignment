<?php

$manAge = null;

// this function use for man age define

function manAgeDefiner(){

    if(isset($_POST["submit"])){
        $manAge = $_POST["age"];
        if($manAge <= 12 && $manAge > 0){
            echo "<span>";
            return "you are baby";
            echo "</span>";
        }elseif($manAge > 12 && $manAge <= 18){
            echo "<span>";
            return "you are teenager";
            echo "</span>";
        }elseif($manAge > 18 && $manAge <= 35){
            echo "<span>";
            return "you are young man";
            echo "</span>";
        }elseif($manAge > 35 && $manAge < 90 ){
            echo "<span>";
            return "you are old man";
            echo "</span>";
        }else{
            echo "<span>";
            return "enter a valid age";
            echo "</span>";
        }
    
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
    <div class="container">

        <form class="ageForm" action='<?php $_SERVER["PHP_SELF"] ?>' method="post">
            <?php echo manAgeDefiner(); ?>
            <input type="number" name="age" placeholder="Enter Your Age" style="padding:11px 0;">

            <input type="submit" name="submit" value="Check Your Age Conditon" class="ageBtn" style="color: white;">
        </form>

    </div>

    <!-- ============================================== -->



    <!-- =================================================== -->
</body>

</html>