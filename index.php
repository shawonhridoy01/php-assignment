<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fluid" style="background-color: #182C61; height:100vh;width:100vw;">
        <div class="row  align-items-center justify-content-center">
            <div class="col-md-12 column" >
                    <div class="inner-box">
                        <h2>Simple Calculator</h2>
                    <form action="./index.php" method="post">
                    <input type="number" name="number1" id="number1" placeholder="Enter Number" class="input-box"> 
                    <input type="number" name="number2" id="number1" placeholder="Enter Number" class="input-box">
                    <select name="operation" id="operation" class="input-box">
                        <option value="add">ADD</option>
                        <option value="sub">SUB</option>
                        <option value="mul">MUL</option>
                        <option value="div">DIV</option>
                    </select>
                    <input type="submit" value="Submit" name="submit" class="submit">
                </form>
                <p>
                <?php
        if(isset($_POST["submit"])){
            $num1= $_POST["number1"];
            $num2= $_POST["number2"];
            $oper= $_POST["operation"];
            
            switch($oper){
                case("add"):
                        $sum = $num1 + $num2;
                        
                        echo "Sum of this two number ". $sum;
                        
                        break;
                case("sub"):
                        $sub = $num1 - $num2;
                        echo "Subtraction of this two number ". $sub;
                        break;
                case("mul"):
                        $sum = $num1 * $num2;
                        echo "Multiplication of this two number ". $sum;
                        break;
                case("div"):
                        $sum = $num1 /  $num2;
                        echo "Divistion of this two number ". $sum;
                        break;
                
                default:
                    echo "This is not a number";
                    break;
            }
        
        }
    ?>

                </p>
                    </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>