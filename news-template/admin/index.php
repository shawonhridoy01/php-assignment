
<?php 

// username
// password
// login

session_start();
include "../database/config.php";

if(isset($_SESSION["username"] )){
    header("location:{$dir}/users.php");
}

if(isset($_POST["login"])){
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    $selectQuery = "select * from user where username = '{$username}'";
    $selectQueryResult = mysqli_query($conn,$selectQuery);

    if(mysqli_num_rows($selectQueryResult) > 0){
        while($row = mysqli_fetch_assoc($selectQueryResult)){
            $dbpassword = $row["password"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["user_id"];
            
    
            
        }
        $passwordEncrypt = password_verify($password,$dbpassword);
            if($passwordEncrypt == true){
            
                header("location:{$dir}/users.php");
                // ?msg={$message}
            }
            else{
                $message = "password is incorrect";
             }

    }else{
        $message = "Username is valid try again";
    }
}


?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>

                        <!-- Form Start -->

                        <?php 

                            if(empty($message)){
                                echo "";
                            }else{
                                echo $message;
                            }
                        
                        ?>
                        <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
