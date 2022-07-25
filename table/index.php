<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<?php

$products = [

    ['name' => "Apple",     'product_stock' =>  54,  'total_price' =>  500],
    ['name' => "Orange",     'product_stock' =>  40,  'total_price' =>  265],
    ['name' => "Pineapple",  'product_stock' =>  25,  'total_price' =>  300]


];



$courses =                 [
        [

        "course_title"    => "SDGs for Youth: My Goal, My Responsibility",
        "course_author"   => "shawon hridoy",
        "course_enrolled" => 300,
        "course_price"    => 400,
        "thumbnail" => "img1.jpg"

        ],

        [

        "course_title"    => "The Art of Public Speaking",
        "course_author"   => "Fazle Fabbi",
        "course_enrolled" => 256,
        "course_price"    => 450,
        "thumbnail" => "img2.jpg"

        ],


        [
        "course_title"    => "An Introduction to Job Searching Techniques",
        "course_author"   => "Tania Akter",
        "course_enrolled" => 664,
        "course_price"    => 750,
        "thumbnail" => "img3.jpg"
        ]

]

?>

<body>


    <div class="container mt-5">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S. No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantiy</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Total Price</th>
                </tr>

            </thead>

            <tbody>

                <?php

                foreach ($products as $key => $product) {

                ?>
                    <tr>
                        <th scope="row"><?php echo ++$key ?></th>
                        <td><?php echo $product["name"]; ?></td>
                        <td><?php echo $product["product_stock"]; ?></td>
                        <td><?php echo $product["total_price"]; ?></td>
                        <td><?php echo $product["total_price"] * $product["product_stock"]; ?></td>
                    </tr>

                <?php
                };
                ?>
            </tbody>
        </table>

    </div>


    <div class="container">
        <div class="row">

        <?php 
            foreach ($courses as $key => $course) {
            
        ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./img/<?php echo $course['thumbnail']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                            <h4><?php echo $course["course_title"]; ?></h4>
                            <p>By <?php echo $course["course_author"]; ?></p>
                            <hr>
                            <span><?php echo $course["course_price"]; ?></span>
                            <span><?php echo $course["course_enrolled"]; ?></span>
                    </div>
                </div>
            </div>
        <?php

            }
        ?>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>