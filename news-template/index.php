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

                        $limit = 2 ;
                        // $page = $_GET["page"];
                        if(isset($_GET["page"])){
                            $page = $_GET["page"];
                        }else{
                            $page =1;
                        }
                        $offset = ($page -1 ) * $limit;
                        $selectQuery = "select post.*,category.category_name from post inner join category on post.category = category.category_id limit {$offset},{$limit}";
    
                        $selectQueryResult = mysqli_query($conn,$selectQuery);
                        if(mysqli_num_rows($selectQueryResult) > 0){
                            while($row = mysqli_fetch_assoc($selectQueryResult)){
                                
                      


                        ?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="./admin/upload/<?php echo $row['post_img']  ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row["title"]  ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'><?php echo $row["category_name"]  ?></a>
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
                                        <p class="description">
                                        <?php 
                                        echo paragraphTrim($row["description"] ,25). "..."
                                         ?>
                                        </p>
                                        <a class='read-more pull-right' href="single.php?id=<?php echo $row['post_id'] ?> ">read more</a>
                                    </div>
                                </div>
                            </div>
                        <?php  }} ?>
                    
                    
                
                        <!-- <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul> -->

                        <!-- pagination code  -->
                                  <!-- pagination query code  -->
                  <ul class='pagination'>
                      <?php 
                     
                     if($page > 1){
                    
                            echo "<li><a href = index.php?page=".$page-1 ." >Prev</a></li>";
                        
                  
                     }
                        
                  $selectQuery2 = "select post.*,category.category_name from post inner join category on post.category = category.category_id";
    
                  $selectQueryResult2 = mysqli_query($conn,$selectQuery2);
                  if(mysqli_num_rows($selectQueryResult2) > 0){
                    $totalRecords = mysqli_num_rows($selectQueryResult2);
                    
                    $totalPages = ceil($totalRecords / $limit);
                    // $totalPages = 1;
                
            
                
                    
                    for($i = 1; $i <= $totalPages; $i++){

                        if($i == $page){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        echo "<li class =".$active." ><a href = 'index.php?page={$i}'>{$i}</a></li>";
                    }

                
                  }

                  if($totalPages > $page){
                    echo "<li><a href = index.php?page=".$page+1 ." >Next</a></li>";
             }

                  ?>
    
                  </ul>
                  <!-- pagination query code  end -->

                        <!-- pagination code  end-->
                    
    
            </div>
                
                
            
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
                
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
