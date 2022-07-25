<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<style>

#menu-bar .menu > li.active{
    background-color: red;
}
</style>

<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <a href="index.php" id="logo"><img src="images/news.jpg"></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php 
                
                if (isset($_GET["id"])) {
                    $cid = $_GET["id"];
                }
                $categoryQuery = "select * from category";
                $categoryQueryResult = mysqli_query($conn, $categoryQuery) or die("category query failed");
                if (mysqli_num_rows($categoryQueryResult) > 0) {

                
                ?>
                    <ul class='menu'>
                        <?php


	
                            $active = "";
                            while ($row = mysqli_fetch_assoc($categoryQueryResult)) {
                                if(isset($cid)){

                                    if($row["category_id"] == $cid){
                                        $active = "active";
                                    }else{
                                        $active = '';
                                    }
                                }
                                $cateId = $row['category_id'];
                            
                                echo "<li class ={$active}><a href='category.php?id={$cateId}'>{$row['category_name']}</a></li>";
                            }
                        

                        ?>


                        
                    
                    </ul>
                <?php 
                        }
                ?>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->