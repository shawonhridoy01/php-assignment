<?php 

require "../database/config.php";
include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">

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

        <!-- Form for show edit-->
    
        <?php 
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                }else{
                    // $id= "";
                    header("location:{$dir}/post.php");
                }
                $selectQuery = "select post.*,category.category_name from post left join category on post.category = category.category_id where post_id = '{$id}'";

                $selectQueryResult = mysqli_query($conn,$selectQuery);
                if(mysqli_num_rows($selectQueryResult) > 0){
                    while($row = mysqli_fetch_assoc($selectQueryResult)){
                    
?>

        <form action="./controller/postupdate.php" method="POST" enctype="multipart/form-data" autocomplete="off">

            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
            </div>

            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name="post_title"  class="form-control" id="post_title" value="<?php echo $row['title'] ?>">
            </div>

            <div class="form-group">
                <label for="postdesc"> Description</label>
                <textarea name="postdesc" class="form-control" id="postdesc"  required rows="5">
                <?php echo $row['description'] ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control" value = "<?php echo $row['category'] ?>">
                          <!-- category data fetching query  -->
                          <?php 

                                $select1 = "select * from category";
                                $selectResult1 = mysqli_query($conn,$select1);
                                if(mysqli_num_rows($selectResult1) > 0){
                                    while($row1=mysqli_fetch_assoc($selectResult1)){
                                        // $category_id1 = $row1['category_id'];
                                        // $category_name1 = $row['category'];
                                        if($row['category'] == $row1['category_id'] ){
                                            $selected = "selected";
                                        }else{
                                            echo "";
                                        }
                                
                                        // echo  "<option value=".$row1['category_id'] 
                                        // $category_id1 = $row1['category_id'];
                                        // $category_name12 = $row['category_name'];
                                echo "<option value='{$row1['category_id']}' $selected >{$row['category']}</option>" ;
                                
                            }
                        }
                        ?>
                        </select>
                        </div>
                        
                    
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <!-- <img  src="upload/post_1.jpg" height="150px"> -->
                <input type="hidden" name="old-image" value="<?php echo $row['post_img'] ?>">
                <br><img src="./upload/<?php echo $row['post_img'] ?>" alt="imag" width="400px" height="300px">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>

<?php 

                    }
                }

?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
