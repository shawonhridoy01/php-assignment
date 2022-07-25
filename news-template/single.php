<?php 
require "./config.php";
include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">

                    <?php 

                        if(isset($_GET["id"])){
                            $id = $_GET["id"];
                        }else{
                            header("location:http://localhost/php/news-template/index.php");
                        }
                        $selectQuery = "select post.*,category.category_name from post inner join category on post.category = category.category_id where post_id = '{$id}' ";
    
                        $selectQueryResult = mysqli_query($conn,$selectQuery);
                        if(mysqli_num_rows($selectQueryResult) > 0){
                            while($row = mysqli_fetch_assoc($selectQueryResult)){
                                
                      


                        ?>

                        <div class="post-content single-post text-left">
                            <h3><?php echo $row["title"]  ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row["category_name"]  ?>
                                </span>
                                <!-- <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'>Admin</a>
                                </span> -->
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row["post_date"]  ?>
                                </span>
                            </div>
                            <img class="single-feature-image" style="margin: 30px 0px" src="./admin/upload/<?php echo $row['post_img']  ?>" alt=""/>
                            <p class="description">
                                <?php echo $row["description"] ?>
                            </p>
                        </div>

                    <?php 
                            }
                        }
                    ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
