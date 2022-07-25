<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

    <title>GPA CHECKER</title>
  </head>
  <body>
  

  <!-- ==================================================================== -->
  
<div class="main-div">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 text-center">
                <div class="left-side">
                    <img src="./school.jpg" alt="crud">
                    <h5>Please the form carefully.This form can change your life.</h5>
                    <button><a href="result.php">Check Result</a></button>
                </div>
            </div>
            <div class="col-md-9 right-column">
                <div class="right-side">
                  <form action="result.php?> " method="post" autocomplete="on">
                  <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Enter your Father name" name="father" required>
                        </div>
                      </div>

                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Enter your Mother name" name="mother" required>

                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Enter you Roll" name="roll" required>
                        </div>
                      </div>


                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Registration Code" name="registration" required>
                        </div>
                        <div class="col">
                            <select name="gender" id="gender" class="form-control">
                              <option value="select option" selected>Select Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                        </div>
                      </div>

                      
                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Name of First Subject " name="subject1" required>

                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Marks of First Subject" name="marks1" required>
                        </div>
                      </div>


                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Name of second Subject " name="subject2" required>

                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Marks of second Subject" name="marks2" required>
                        </div>
                      </div>


                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Name of third Subject " name="subject3" required>

                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Marks of trird Subject" name="marks3" required>
                        </div>
                      </div>


                      <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Name of fourth Subject " name="subject4" required>

                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Marks of fourth Subject" name="marks4" required>
                        </div>
                      </div>







                      <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary submit" name="submit" id="submit">Submit</button>
                      </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>


  <!-- ==================================================================== -->



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