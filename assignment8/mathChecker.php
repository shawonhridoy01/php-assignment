<?php
function mathChecker($value1,$value2=10){
    if(isset($_POST["CheckResult"])){
        $optionCheck = $_POST["mathOpt"];
        if($optionCheck == "rectangle"){
            return $value1 *  $value2;
        }elseif($optionCheck == "square"){
            return $value1 * $value1;
        }elseif($optionCheck == "triangle"){
            return ($value1 *  $value2)/2;
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
    <title>Document</title>
</head>
<body>

<div class="containerMath">
        <form action="" method="POST">
            <?php echo "<h3> ";
                        echo mathChecker(10,5);
                        echo " </h3>" 
            ?>
            <select name="mathOpt" id="">
                <option value="rectangle">Rectangle</option>
                <option value="square">Square</option>
                <option value="triangle">Triangle</option>
            </select>
            <input type="submit" name="CheckResult" value="Check Result">
        </form>
    </div>

</body>
</html>