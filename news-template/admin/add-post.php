<?php

require "../database/config.php";

include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="./controller/postController.php" method="POST" enctype="multipart/form-data">
                  
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="postdesc"> Description</label>
                          <textarea name="postdesc" id="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>

                      <div class="form-group">
                          <label for="category">Category</label>
                          <select name="category" id="category" class="form-control">
                          <!-- category data fetching query  -->
                          <?php 

                                $select1 = "select * from category";
                                $selectResult1 = mysqli_query($conn,$select1);
                                if(mysqli_num_rows($selectResult1) > 0){
                                    while($row1=mysqli_fetch_assoc($selectResult1)){

                                
                          
                          ?>
                                
                              <option value="<?php echo $row1['category_id'] ?>"> <?php echo $row1['category_name'] ?></option>
                        

                        <?php      
                        }
                                }
                                ?>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="fileToUpload">Post image</label>
                          <input type="file" name="fileToUpload" id="fileToUpload" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />

                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
