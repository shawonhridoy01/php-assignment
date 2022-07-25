<?php 

// session_start();
require_once("./config.php");


if(isset($_POST["submit"])){
    // fetching all data from frontend form 
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $first_name = mysqli_real_escape_string($conn,$_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn,$_POST["last_name"]);
    // $password = filter_var($password,passw)
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn,$_POST["cpassword"]);

    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $gender =  filter_input(INPUT_POST, 'gender' );
    $email = mysqli_real_escape_string($conn,$_POST["email"]);

    








    // default two variable which will check username name exists or not 
    $userexists = false;
    $emailexists = false;

    // $insert = false ;
    // checking username already existis or not database 
    $CheckUsername = "select username from registration where username ='{$username}' ";
    $CheckUsernameResult = mysqli_query($conn,$CheckUsername);
    if(mysqli_num_rows($CheckUsernameResult) > 0){
        $userexists = true;
    }
    
        // checking email already existis or not database 
    $CheckEmail = "select email from registration where email ='{$email}' ";
    $CheckEmailResult = mysqli_query($conn,$CheckEmail);
    if(mysqli_num_rows($CheckEmailResult) > 0){
        $emailexists = true;
    }


    // validating all form data 

    if(empty($username) || empty($first_name)|| empty($last_name) || empty($password) || empty($cpassword) || empty($phone) || empty($gender) || empty($email) ){
        $message = "All field is required";

    }elseif($userexists == true){
        $message = $username." Already Exists";
    }elseif($emailexists == true){
        $message = $email. "Already Exists";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
        $message = $email. "is not valid";
    }else{

        if($password === $cpassword){
    
                // encrypt passwrd 
            $spassword = password_hash($password,PASSWORD_BCRYPT);
            $insertQuery ="INSERT INTO registration(username,first_name,last_name,password,phone,gender,email) VALUES ('{$username}','{$first_name}','{$last_name}','{$spassword}','{$phone}','{$gender}','{$email}')";

            $insertQueryResult = mysqli_query($conn,$insertQuery);
            if($insertQueryResult){

                header("location:login.php");


            }else{
                $message = "Data Insetion Failed".mysqli_error($conn);
            }

        }else{
            $message = "password and confirm password not matched";

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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="content">
       <img src="https://res.cloudinary.com/debbsefe/image/upload/f_auto,c_fill,dpr_auto,e_grayscale/image_fz7n7w.webp" alt="header-image" class="cld-responsive">
            <h1 class="form-title">Register Here</h1>

            <p>
            
            <?php  
                
                if(empty($message)){
                    echo "";
                }else{
                    echo $message;
                }
            
            ?>


            </p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF'] ) ?>" method="post">
            
               <input type="text" placeholder="Username" name="username">

            <div class="beside">
               <input type="text" placeholder="First Name" name="first_name">
                <input type="text" placeholder="Last Name" name="last_name">
            </div>            
            
            <div class="beside">
               <input type="text" placeholder="Password" name="password">

                <input type="text" placeholder="Confirm Password" name="cpassword">

            </div>    
            
            
            <div class="beside">
                <input type="number" placeholder="Phone Number" name="phone">
                <select name="gender" value = "gender">
                    <option disabled selected>GENDER</option>
                    <option>MALE</option>
                    <option>FEMALE</option>
            
                </select>
            </div>
                <input type="email" placeholder="EMAIL ADDRESS" name="email">
                <input type="submit" name="submit" value="Submit" class="submit">
        
                <a href="login.php" target="_blank">Click Here To Login</a>
            </form>
        </div>
 </div>

</body>
</html>