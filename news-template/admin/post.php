<style>



#admin-content .admin-pagination li.active a {

    background-color: red;
    border-radius: 50%;

}

</style>

<?php



require "../database/config.php";

// if(!isset($_SESSION["username"]) ){
//     header("location:http://localhost/php/news-template/admin/index.php");
// }else{
//     // header("location:http://localhost/php/news-template/admin/post.php");
//     echo "";

// }


include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">

              <?php 
                    
                    if(empty($_GET['msg'])){
                        echo "";
                    }else{

                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$_GET["msg"].'</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        echo "<br>";
                    }        

              
              ?>
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Date</th>
                          <!-- <th>Author</th> -->
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

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
                          <tr>
                              <td class='id'><?php $i = 12; echo $i++; ?></td>
                              <td><?php echo $row["title"] ?></td>
                              <td><?php echo $row["description"] ?></td>
                              <td><?php echo $row["category_name"] ?></td>
                              <td>
                                <img src="./upload/<?php echo $row['post_img'] ?>" alt="imag" width="50px" height="50px">
                              </td>
                              <td><?php echo $row["post_date"] ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row["post_id"] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row["post_id"]  ?>&& category=<?php echo $row["category"] ?>  '><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                            
                        <?php             
                    }
                }
                        ?>
                    
                      </tbody>
                  </table>

                  <!-- pagination query code  -->
                  <ul class='pagination admin-pagination'>
                      <?php 
                     
                     if($page > 1){
                    
                            echo "<li><a href = post.php?page=".$page-1 ." >Prev</a></li>";
                        
                  
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
                        echo "<li class =".$active." ><a href = 'post.php?page={$i}'>{$i}</a></li>";
                    }

                
                  }

                  if($totalPages > $page){
                    
                    echo "<li><a href = post.php?page=".$page+1 ." >Next</a></li>";
                
          
             }

                  ?>
        
                  </ul>
                  <!-- pagination query code  end -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
