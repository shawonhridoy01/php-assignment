
<?php

/**
 *this function will show validation message 

 *  parameter [type] = alert type 
 *  message
 */
function validate($message,$type = "warning"){
  return  "<div class=\"alert alert-{$type} alert-dismissible fade show\" role=\"alert\">
  {$message}
  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"><\button>
</div>";
}
if(isset($_POST["submit"])){
    $username = $_POST["name"];
    $userEmail = $_POST["email"];
    $userPhone = $_POST["phone"];
    if($username == "" && $userEmail == "" && $userPhone == ""){
        $validationMessage = validate("All field is required","danger");
    }elseif(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
      $validationMessage = validate("Email is not valid","warning");
    }
    else{
      $validationMessage = validate("Everything is ok","success");
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>


  </head>
  <body>


  <div id="tsparticles"></div>
<div class="login-box">
  <h2>Login</h2>
  <?php
    if(isset($validationMessage)){
      echo $validationMessage;
    }

?>
  <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <div class="user-box">
      <input type="text"  name="name">
      <label>Username</label>
    </div>

    <div class="user-box">
      <input type="texy" name="email">
      <label>Email</label>
    </div>
    
    <div class="user-box">
      <input type="tel" name="phone" >
      <label>Phone</label>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="Submit" name = "submit" style="background-color: transparent; color:white;border:none;">
    </a>
  </form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./main.js"></script>

  </body>
</html>