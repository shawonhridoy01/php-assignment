<?php


session_start();

include "../database/config.php";

if(!isset($_SESSION["username"]) ){
    header("location:http://localhost/php/news-template/admin/index.php");
}

include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">

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
                    if(isset($_SESSION["username"])){

                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$_SESSION["username"].'</strong> Welcome to dashboard.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        echo "<br>";


                    
                    }
            ?>
                  <table class="content-table">

                
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

                      <?php 
                  
                  if(isset($_GET["page"])){
                    $page = $_GET["page"];
                  }else{
                     $page =1;
                  }
                //  
                  $limit = 4;
                  $offset = ($page -1) * $limit ;
                  $selectQuery = "SELECT * FROM user order by  user_id desc  limit {$offset},{$limit} ";
                  $selectQueryResult = mysqli_query($conn,$selectQuery) or die("query failed");

                  if(mysqli_num_rows($selectQueryResult) > 0){
                      while($row = mysqli_fetch_assoc($selectQueryResult)){
                          
                

                
                ?>
                          <tr>
                              <td class='id'><?php echo $row["user_id"] ?></td>
                              <td><?php echo $row["first_name"]." ". $row["last_name"] ; ?></td>
                              <td><?php echo $row["username"] ?></td>
                              <td>

                                    <?php 

                                        if($row["role"] == 1){
                                            echo "Admin";
                                        }else{
                                            echo "Normal";
                                        }

                                    ?>
                              
                              </td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                    
                            
                    <?php     
                      }
                  }
                  ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                  
                  <?php 

                        $selectQuery1 = "select * from user";
                        $selectQueryResult1 = mysqli_query($conn,$selectQuery1);
                        if(mysqli_num_rows($selectQueryResult1) > 0){
                            $totalRecords = mysqli_num_rows($selectQueryResult1) ;
                            
                            $pagtotalNumPage = ceil($totalRecords / $limit);
                            if($page > 1){
                                echo "<li><a href = users.php?page=".$page-1 ." >Prev</a></li>";
                            }
                            for($i = 1; $i <= $pagtotalNumPage; $i++){

                                if($i == $page){
                                    $active = "active";
                                }else{
                                    $active = "";
                                }
                                echo "<li class =".$active ." ><a href = 'users.php?page=$i'>{$i}</a></li>";
                            }
                            if($pagtotalNumPage > $page){
                                echo "<li><a href = users.php?page=".$page+1 ." >Next</a></li>";
                            }
                        }
                  
                  
                  ?>
                 
                      <!-- <li class="active"><a>1</a></li> -->
                      
                    
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "header.php"; ?>
