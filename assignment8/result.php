<?php
    // $name = $_POST["name"];
    // $Fname = $_POST["father"];
    // $Mname = $_POST["mother"];
    // $roll = $_POST["roll"];
    // $registration = $_POST["registration"];
    // $gender = $_POST["gender"];
    
    // $subject1 = $_POST["subject1"];
    // $marks1 = $_POST["marks1"];

    // $subject2 = $_POST["subject2"];
    // $marks2 = $_POST["marks2"];  

    // $subject3 = $_POST["subject3"];
    // $marks3 = $_POST["marks3"];

    // $subject4 = $_POST["subject4"];
    // $marks4 = $_POST["marks4"];



if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $Fname = $_POST["father"];
    $Mname = $_POST["mother"];
    $roll = $_POST["roll"];
    $registration = $_POST["registration"];
    $gender = $_POST["gender"];
    
    $subject1 = $_POST["subject1"];
    $marks1 = $_POST["marks1"];

    $subject2 = $_POST["subject2"];
    $marks2 = $_POST["marks2"];  

    $subject3 = $_POST["subject3"];
    $marks3 = $_POST["marks3"];

    $subject4 = $_POST["subject4"];
    $marks4 = $_POST["marks4"];

    // echo $name."<br>";
    // echo $Fname."<br>";
    // echo $Mname."<br>";
    // echo $roll."<br>";
    // echo $registration."<br>";
    // echo $gender."<br>";
    // echo $subject1."<br>";
    // echo $marks1."<br>";
    // echo $subject2."<br>";
    // echo $marks2."<br>";
    // echo $subject3."<br>";
    // echo $marks3."<br>";
    // echo $subject4."<br>";
    // echo $marks4."<br>";
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
    <!-- <link rel="stylesheet" href="style2.css"> -->

    <title>Hello, world!</title>

    <style>
    body{
        display: flex;
            align-items: center;
            justify-content: center;
    }
        .my-container{
            border: 3px solid gray;
            width: 800px;
        
        }
    </style>
  </head>
  <body>


  <div class="my-container">
        <div class="container ">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="school-logo">
                          <img src="./school.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <h3>sher shah collony dr. mozharul hoque high school</h3>
                    </div>


                </div>


                <div class="row">
                        <div class="col-md-6">
                            <h4>Name: <?php echo $name ?></h4>
                            <h4>Father Name: <?php echo $Fname ?> </h4>
                            <h4>Mother Name: <?php echo $Mname ?></h4>
                        </div>

                        <div class="col-md-6">
                            <h4>Gender: <?php echo $gender ?></h4>
                            <h4>Roll Name: <?php echo $roll ?></h4>
                            <h4>Registration:  <?php echo $registration ?></h4>
                        </div>

                </div>

                <div class="row">

                                                
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Subject Code</th>
                                        <th scope="col">Subject Name</th>
                                        <th scope="col">Marks Obtained</th>
                                        <th scope="col">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">101</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        </tr>

                                    </tbody>
                                    </table>
                </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


